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
            'imagem' => 'produtos/velas.jpg',
            'categoria' => 'Velas',
        ]);

        Produto::create([
            'nome' => 'Kit de Oferenda',
            'preco' => 219.90,
            'estoque' => 2,
            'descricao' => 'O Kit de Oferenda Religiosa reúne elementos tradicionais utilizados em rituais, firmezas e momentos de conexão espiritual. É ideal para quem busca compor oferendas completas, simbolizando força, equilíbrio e agradecimento às energias espirituais.',
            'imagem' => 'produtos/oferenda.jpg',
            'categoria' => 'Kits',
        ]);

        Produto::create([
            'nome' => 'Kit de Conexão Espiritual',
            'preco' => 199.90,
            'estoque' => 2,
            'descricao' => 'O Kit Místico de Conexão Espiritual é ideal para quem busca fortalecer a intuição, elevar a energia e criar um ambiente de harmonia e proteção. Reúne elementos tradicionais usados em práticas de leitura, meditação e firmeza espiritual.',
            'imagem' => 'produtos/conexão.jpg',
            'categoria' => 'Kits',
        ]);
        
        Produto::create([
            'nome' => 'Escultura Dama do Fogo',
            'preco' => 110.90,
            'estoque' => 2,
            'descricao' => 'Deixe a energia da transformação tomar conta do seu espaço com esta belíssima Escultura da Dama do Fogo. Feita em resina de alta qualidade, a peça representa o poder purificador das chamas e a coragem de quem renasce das próprias cinzas. Com detalhes vibrantes em tons de dourado, laranja e vermelho, essa obra transmite movimento, intensidade e espiritualidade. A chama translúcida em suas mãos simboliza luz, proteção e energia vital, tornando-a perfeita para altares, espaços de meditação ou decoração espiritual.',
            'imagem' => 'produtos/fogo.jpg',
            'categoria' => 'Imagens',
        ]);
        
        Produto::create([
            'nome' => 'Escultura Iemanjá',
            'preco' => 130.90,
            'estoque' => 2,
            'descricao' => 'Esta linda imagem de Iemanjá, Rainha do Mar, é uma peça que transmite força, beleza e serenidade.
            Produzida com riqueza de detalhes, a escultura retrata Iemanjá com seus braços erguidos, vestida em tons de azul e adornada com conchas e estrelas-do-mar, simbolizando sua conexão com o oceano e a energia feminina.',
            'imagem' => 'produtos/iemanja.jpg',
            'categoria' => 'Imagens',
        ]);

        Produto::create([
            'nome' => 'Kit de Proteção',
            'preco' => 300.90,
            'estoque' => 2,
            'descricao' => 'Este Kit de Proteção e Abertura de Caminhos é ideal para firmezas, oferendas e rituais voltados à força, sabedoria e transformação espiritual.
            Composto por itens tradicionais e simbólicos, representa o equilíbrio entre o mundo material e o espiritual, trazendo energia, movimento e prosperidade para o seu caminho.',
            'imagem' => 'produtos/proteção.jpg',
            'categoria' => 'Imagens',
        ]);
    }

    
}
