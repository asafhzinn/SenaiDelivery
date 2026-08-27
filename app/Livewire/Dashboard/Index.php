<?php

namespace App\Livewire\Dashboard;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $totalAdministradores;
    public $totalClientes;
    public $totalCategorias;
    public $totalProdutos;

    public $ultimosProdutos = [];

    public function mount(){
        // Contagem de administradores
        $this->totalAdministradores = User::where('tipo', User::TIPO_ADMIN)->count();

        // Contagem de clientes
        $this->totalClientes = User::where('tipo', User::TIPO_CLIENTE)->count();
        // contagem de categorias
        $this->totalCategorias = Categoria::count();
        // contagem de produtos
        $this->totalProdutos = Produto::count();
        // contagem ultimos produtos
        $this->ultimosProdutos = Produto::with('categoria')->latest()->limit(5)->get();

    }
    public function render()
    {
        return view('livewire.dashboard.index')
        ->layout('layouts.app', ['admin' => true]);
    }
}
