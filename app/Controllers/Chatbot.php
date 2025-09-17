<?php

namespace App\Controllers;

use App\Models\FaqModel;
use CodeIgniter\Controller;

class Chatbot extends Controller
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        return view('chatbot/index');
    }

    public function ask()
    {
        $input = strtolower($this->request->getPost('message'));
        $faqs = $this->faqModel->findAll();

        foreach ($faqs as $faq) {
            $keywords = explode(',', $faq['kata_kunci']);
            foreach ($keywords as $keyword) {
                if (strpos($input, trim(strtolower($keyword))) !== false) {
                    return $this->response->setJSON([
                        'reply' => $faq['jawaban']
                    ]);
                }
            }
        }

        return $this->response->setJSON([
            'reply' => "Maaf, saya belum mengerti pertanyaan Anda. Silakan hubungi admin."
        ]);
    }
}
