<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            'Lanches' => [  
        ['nome' => 'X-Burguer', 'descricao' => 'Pão, Hamburguer, queijo e molho especial.', 'destaque' => true],
        ['nome' => 'X-Bacon', 'descricao' => 'Pão, Hamburguer, queijo, bacon e salada.', 'destaque' => true],
            ],

            'Porções' => [
        ['nome' => 'Batata Frita', 'descricao' => 'Batata frita crocante com sal.', 'preco' => 22.90, 'destaque' => false],
                ['nome' => 'Calabresa Acebolada', 'descricao' => 'Porção de calabresa acebolada com molho especial.', 'preco' => 29.90, 'destaque' => true],
            ],

            'Bebidas' => [
        ['nome' => 'Refrigerantes', 'descricao' => 'Refrigerante gelado.', 'preco' => 6.00, 'destaque' => false],
                ['nome' => 'Suco Natural', 'descricao' => 'Suco natural de frutas da estação.', 'preco' => 10.00, 'destaque' => true],   
            ],

            'Sobremesas' => [
                ['nome' => 'pudim', 'descricao' => 'Fatia de pudim.', 'preco' => 9.90, 'destaque' => false],
                ['nome' => 'sorvete', 'descricao' => 'sorvete com cobertura.', 'preco' => 10.00, 'destaque' => true],
            ],
        ];

        foreach ($produtos as $nomeCategoria => $itens) {
            $categoria = Categoria::where('nome', $nomeCategoria)->firstOrfail();


            foreach ($itens as $produto) {
                Produto::create([
                    'categoria_id' => $categoria->id,
                    'nome' => $produto['nome'],
                    'descricao' => $produto['descricao'],
                    'preco' => $produto['preco'],
                    'ativo' => true,
                    'destaque' => $produto['destaque']
                ]
            );
            }
        }
    }
}
