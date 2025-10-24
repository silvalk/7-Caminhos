<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create([
            'nome' => 'Velas Brancas',
            'preco' => 20,
            'estoque' => 15,
            'descricao' => 'A Vela Branca é um dos itens mais utilizados em práticas espirituais. Representa luz, equilíbrio e paz, sendo ideal para orações, firmezas, trabalhos espirituais e oferendas. Este pacote contém 4 velas de alta qualidade, com queima uniforme e chama firme, perfeitas para seus rituais e momentos de conexão com a espiritualidade.',
            'imagem' => 'https://example.com/dell-inspiron.jpg',
            'categoria' => 'Velas',
        ]);

        Produto::create([
            'nome' => 'Kit de Oferenda',
            'preco' => 219.90,
            'estoque' => 2,
            'descricao' => 'O Kit de Oferenda Religiosa reúne elementos tradicionais utilizados em rituais, firmezas e momentos de conexão espiritual. É ideal para quem busca compor oferendas completas, simbolizando força, equilíbrio e agradecimento às energias espirituais.',
            'imagem' => 'https://example.com/camiseta-preta.jpg',
            'categoria' => 'Kits',
        ]);

        Produto::create([
            'nome' => 'Kit de Conexão Espiritual',
            'preco' => 199.90,
            'estoque' => 2,
            'descricao' => 'O Kit Místico de Conexão Espiritual é ideal para quem busca fortalecer a intuição, elevar a energia e criar um ambiente de harmonia e proteção. Reúne elementos tradicionais usados em práticas de leitura, meditação e firmeza espiritual.',
            'imagem' => 'https://example.com/camiseta-preta.jpg',
            'categoria' => 'Kits',
        ]);
        
        Produto::create([
            'nome' => 'Escultura Dama do Fogo',
            'preco' => 110.90,
            'estoque' => 2,
            'descricao' => 'Deixe a energia da transformação tomar conta do seu espaço com esta belíssima Escultura da Dama do Fogo. Feita em resina de alta qualidade, a peça representa o poder purificador das chamas e a coragem de quem renasce das próprias cinzas. Com detalhes vibrantes em tons de dourado, laranja e vermelho, essa obra transmite movimento, intensidade e espiritualidade. A chama translúcida em suas mãos simboliza luz, proteção e energia vital, tornando-a perfeita para altares, espaços de meditação ou decoração espiritual.',
            'imagem' => 'https://example.com/camiseta-preta.jpg',
            'categoria' => 'Imagens',
        ]);
        
    }
}
