<?php

namespace App\Controllers;

use App\Models\FaqModel;

class Faq extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        $data['title'] = 'Kelola FAQ';
        $data['faq']   = $this->faqModel->findAll();
        return view('faq/index', $data);
    }

    public function create()
    {
        return view('faq/create', ['title' => 'Tambah FAQ']);
    }

    public function store()
    {
        $this->faqModel->save([
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban'    => $this->request->getPost('jawaban'),
            'kata_kunci' => $this->request->getPost('kata_kunci'),
        ]);
        return redirect()->to('/faq')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['faq'] = $this->faqModel->find($id);
        $data['title'] = 'Edit FAQ';
        return view('faq/edit', $data);
    }

    public function update($id)
    {
        $this->faqModel->update($id, [
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'jawaban'    => $this->request->getPost('jawaban'),
            'kata_kunci' => $this->request->getPost('kata_kunci'),
        ]);
        return redirect()->to('/faq')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->faqModel->delete($id);
        return redirect()->to('/faq')->with('success', 'FAQ berhasil dihapus.');
    }
}
