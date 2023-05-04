<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model = null;
    protected $table = null;

    protected $table_view = [
        [
            'label' => 'Nama',
            'column' => 'name',
        ],
        [
            'label' => 'Saldo',
            'column' => 'balance',
            'render_as' => 'currency:Rp'
        ],
        [
            'label' => 'Total',
            'column' => 'total',
            // 'render' => fn ($value) => ("Rp. " . number_format($value, 3))
        ],
    ];

    protected $table_action = [
        [
            'color' => 'primary',
            'icon' => 'fas fa-glass',
            'text' => null,
            // 'href' => url('user/:id/block'),
            'show_if' => ':balance > 100'
        ]
    ];



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('thundercrud.crud.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
