<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
         $this->load->model('User_model');
    }

    private function cek_login(){
        if (!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan Login Terlebih Dahulu</div>');
            redirect('auth');
        }
    }

      public function index()
    {
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_level');
    
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if ($this->form_validation->run() == false) {
            //$data['title'] = 'Login Page';
            $this->load->view('auth/login');
        } else {
            // validasinya succes
            $this->_login();
        }
    }                                                                                                           


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();    

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'userid' => $user['userid'],
                        'email' => $user['email'],
                        'user_level' => $user['user_level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['user_level'] == 'User') {
                         $this->session->set_flashdata('success', 'Selamat, Anda Berhasil Login Ke Aplikasi.');
                        redirect('dashboard');
                    } else {
                         $this->session->set_flashdata('success', 'selamat, Anda Berhasil Login Ke Aplikasi.');
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth');
                 }
               } else {
                   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Belum Aktif!</div>');
                   redirect('auth');
                }
             } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Belum Terdaftar!</div>');
                   redirect('auth');
                }
            }


            public function logout()
            {
                $this->session->unset_userdata('userid');
                $this->session->unset_userdata('email');
                $this->session->unset_userdata('user_level');

                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Berhasil logout!</div>');
                redirect('auth');
             }

            public function register() 
            {
                $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

                if ($this->form_validation->run() == false) {
                    $this->load->view('auth/register');
                } else {
                    $email = $this->input->post('email', true);
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'username' => htmlspecialchars($this->input->post('username')),
                        'email' => htmlspecialchars($email),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'photo' => 'default.jpg',
                        'user_level' => 'User',
                        'created_at' => date('Y-m-d H:i:s'),
                        'is_active' => 0, // You might want to change this based on your activation process
                    ];

                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];

                    $this->db->insert('users', $data);
                    $this->db->insert('user_token', $user_token);

                    $this->_sendEmail($token, 'verify');

                    $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Berhasil Register Akun!, Silahkan Buka Email Untuk Aktifkan Akun Anda </div>');
                    redirect('auth');
                }
            }

            public function profil($userid)
            {
                $this->cek_login();
                $data['user'] = $this->User_model->get_user_by_id($userid);
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('user/profil', $data);
                $this->load->view('templates/footer');
            }

            public function editprofil($userid)
            {
                $this->cek_login();
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username['.$userid.']');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email['.$userid.']');

                if ($this->form_validation->run() == FALSE) {
                    //validation failed
                    $data['user'] = $this->User_model->get_user_by_id($userid);
                    $this->load->view('templates/sidebar');
                    $this->load->view('user/editprofil', $data);
                    $this->load->view('templates/header');
                    $this->load->view('templates/footer');
                } else {
                    // validation successful
                    $config['upload_path'] = './uploads/'; // set your upload path
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 2048; //set your maximum file size limit

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('photo')) {
                        // file uploaded successfully
                        $data = $this->upload->data();

                        $user_data = array(
                            'nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('alamat'),
                            'username' => $this->input->post('username'),
                            'email' => $this->input->post('email'),
                            'telepon' => $this->input->post('telepon'),
                            'photo' => $data['file_name'],
                        );

                        if ($this->User_model->update_user($userid, $user_data)) {
                            $this->session->set_flashdata('success', 'Data Berhasil Diedit.');
                        } else {
                            $this->session->set_flashdata('error', 'Gagal Mengedit Data.');
                        }

                        redirect('dashboard');
                    } else {
                        //file upload failded or no file selected
                        $user_data = array(
                            'nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('alamat'),
                            'username' => $this->input->post('username'),
                            'email' => $this->input->post('email'),
                            'telepon' => $this->input->post('telepon'),
                        );

                        if ($this->User_model->update_user($userid, $user_data)) {
                            $this->session->set_flashdata('success', 'Data Berhasil Diedit.');
                        } else {
                            $this->session->set_flashdata('error', 'Gagal Mengedit Data.');
                        }

                        redirect('dashboard');
                    }
                }
            }

            public function check_email($email, $userid)
            {
                $existingUser = $this->User_model->getByEmail($email);
                if ($existingUser && $existingUser->userid != $userid) {
                    $this->form_validation->set_message('check_email', 'Email Telah Terdaftar!');
                    return false;
                }
                return true;
            }

            public function check_username($username, $userid)
            {
                $existingUser = $this->User_model->getByUsername($username);
                if ($existingUser && $existingUser->userid != $userid) {
                    $this->form_validation->set_message('check_username', 'Username Telah Terdaftar!');
                    return false;
                }
                return true;
            }

            private function _sendEmail($token, $type)
            {
                $config = [
                        'protocol'  => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_user' => 'perpustakaan885@gmail.com',
                        'smtp_pass' => 'ryoybtipcgvltfyo',
                        'smtp_port' => 456,
                        'emailtype' => 'html',
                        'charset'   => 'utf-8',
                        'newline'   => "\r\n"
                ];  

                $this->email->initialize($config);

                $this->email->from('perpustakaan885@gmail.com', 'Aplikasi Perpustakaan Digital');
                $this->email->to($this->input->post('email'));

                if ($type == 'verify') {
                    $this->email->subject('Verifikasi Akun');
                    $this->email->message('Klik Link Berikut Untuk Aktivasi Akun Anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
                } else if ($type == 'forgot')  {
                    $this->email->subject('Reset Password');
                    $this->email->message('Klik Link Berikut Untuk Mereset Password Anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
            }

            if ($this->email->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }


        public function verify()
        {
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            $user = $this->db->get_where('users', ['email' => $email])->row_array();

            if ($user) {
                $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

                if ($user_token) {
                    if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                        $this->db->set('is_active', 1);
                        $this->db->where('email', $email);
                        $this->db->update('users');

                        $this->db->delete('user_token', ['email' => $email]);

                        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">' . $email . 'Telah Diaktifkan! Silahkan Login.</div>');
                        redirect('auth');
                    } else {
                        $this->db->delete('users', ['email' => $email]);
                        $this->db->delete('user_token', ['email' => $email]);

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Gagal! Token Expired.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Gagal! Token Salah.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Gagal! Email Salah.</div>');
                        redirect('auth');
                }
        }

        public function lupa_password()
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

            if ($this->form_validation->run() == false) {
                $this->load->view('auth/lupa_password');
            } else {
                $email = $this->input->post('email');
                $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

                if ($user) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];

                    $this->db->insert('user_token', $user_token);
                    $this->_sendEmail($token, 'forgot');

                    $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Silahkan Cek Email Anda Untuk Mereset Password!</div>');
                        redirect('auth/lupa_password');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar Atau Aktif!</div>');
                        redirect('auth/lupa_password');
                }
            }
        }

        public function resetPassword()
        {
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            $user = $this->db->get_where('users', ['email' =>$email])->row_array();

            if ($user) {
                $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

                if ($user_token) {
                        $this->session->set_userdata('reset_email', $email);
                        $this->changePassword();
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Token Salah.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email Salah.</div>');
                        redirect('auth');
                }
        }


        public function changePassword()
        {
           if (!$this->session->userdata('reset_email')) {
            redirect('auth');
           }

            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]matches[password2]');
            $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]matches[password1]');
            
            if ($this->form_validation->run() == false) {
                $this->load->view('auth/change_password');
            } else {
                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $email = $this->session->userdata('reset_email');

                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('users');

                $this->session->unset_userdata('reset_email');

                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Password Telah Diubah! Silahkan Login.</div>');
                redirect('auth');
            }
        }

        public function gantipassword($userid)
        {
            $this->cek_login();

            // form validation rules
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]matches[password2]', [
                'matches' => 'Password Tidak Sesuai!',
                'min_length' => 'Password Terlalu Pendek!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == false) {
                $data['user'] = $this->User_model->get_user_by_id($userid);
                //validation failed
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('user/gantipassword',$data);
                $this->load->view('templates/footer');
            } else {
                // validation successful
                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

                $user_data = array(
                    'password' => $password,
                );

                if ($this->User_model->update_user($userid, $user_data)) {
                    $this->session->set_flashdata('success', 'Password Berhasil Diubah.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal Mengubah Password.');
                }

                redirect('dashboard');
        }

    }
}

