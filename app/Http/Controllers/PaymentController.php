<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('payments.index');
    }

    public function create(): RedirectResponse
    {
        return redirect()
            ->route('payments.index')
            ->with('error', 'Chức năng thêm thanh toán đang được phát triển.');
    }

    public function store(): RedirectResponse
    {
        return redirect()
            ->route('payments.index')
            ->with('error', 'Chức năng thêm thanh toán đang được phát triển.');
    }

    public function show(string $id): RedirectResponse
    {
        return redirect()
            ->route('payments.index')
            ->with('error', 'Chức năng chi tiết thanh toán đang được phát triển.');
    }

    public function edit(string $id): RedirectResponse
    {
        return redirect()
            ->route('payments.index')
            ->with('error', 'Chức năng cập nhật thanh toán đang được phát triển.');
    }

    public function update(string $id): RedirectResponse
    {
        return redirect()
            ->route('payments.index')
            ->with('error', 'Chức năng cập nhật thanh toán đang được phát triển.');
    }

    public function destroy(string $id): RedirectResponse
    {
        return redirect()
            ->route('payments.index')
            ->with('error', 'Chức năng xóa thanh toán đang được phát triển.');
    }
}
