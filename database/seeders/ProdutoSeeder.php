<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create([
            'nome' => 'Vela Branca (4 Unidades)',
            'preco' => 20,
            'estoque' => 15,
            'descricao' => 'A Vela Branca é um item tradicional nas práticas espirituais, produzida em parafina de alta qualidade com queima uniforme. Representa luz, equilíbrio e paz, ideal para orações, rituais, firmezas e oferendas, fortalecendo a fé e a conexão espiritual.

            Características:
            • Material: Parafina
            • Tamanho: Cerca de 15 cm de altura
            • Acabamento: Liso, queima uniforme
            • Cor: Branca
            • Itens inclusos: 4 velas
            • Indicações de uso: Oferendas, orações, firmezas, rituais e decoração de altares',
            'imagem' => 'produtos/velas.jpg',
            'categoria' => 'Velas',
        ]);

        Produto::create([
            'nome' => 'Kit de Oferenda',
            'preco' => 219.90,
            'estoque' => 2,
            'descricao' => 'O Kit de Oferenda Religiosa reúne um colar de búzios naturais, uma estatueta de madeira entalhada e uma garrafa de whisky, elementos tradicionais para rituais e oferendas. Ideal para simbolizar força, equilíbrio e gratidão em suas práticas espirituais.

            Características:
            • Material: Búzios, madeira e bebida alcoólica
            • Itens inclusos: Colar, estatueta e whisky
            • Indicações de uso: Rituais, oferendas e conexão espiritual',
            'imagem' => 'produtos/oferenda.jpg',
            'categoria' => 'Kits',
        ]);

        Produto::create([
            'nome' => 'Kit de Conexão Espiritual',
            'preco' => 199.90,
            'estoque' => 2,
            'descricao' => 'O Kit Místico de Conexão Espiritual reúne elementos tradicionais para leitura, meditação e firmeza espiritual. Ideal para quem busca fortalecer a intuição, elevar a energia e criar um ambiente de harmonia e proteção em suas práticas espirituais.

            Características:
            • Material: Papel, tecido, vidro e madeira
            • Itens inclusos: Baralho de tarot, taça decorativa, estatuetas, e outros acessórios místicos
            • Indicações de uso: Leitura de tarot, meditação, firmezas e rituais espirituais',
            'imagem' => 'produtos/conexão.jpg',
            'categoria' => 'Kits',
        ]);
        
        Produto::create([
            'nome' => 'Escultura Dama do Fogo',
            'preco' => 110.90,
            'estoque' => 2,
            'descricao' => 'A Escultura da Dama do Fogo em resina representa o poder purificador das chamas e a coragem do renascimento. Com detalhes dourados, laranja e vermelho, transmite intensidade e espiritualidade. A chama translúcida simboliza luz, proteção e energia vital, ideal para altares, meditação e decoração espiritual.

            Características:
            • Material: Resina
            • Acabamento: Detalhes vibrantes em dourado, laranja e vermelho
            • Itens inclusos: 1 escultura
            • Indicações de uso: Altares, meditação e decoração espiritual',
            'imagem' => 'produtos/fogo.jpg',
            'categoria' => 'Imagens',
        ]);
        
        Produto::create([
            'nome' => 'Escultura Iemanjá',
            'preco' => 130.90,
            'estoque' => 2,
            'descricao' => 'A Escultura de Iemanjá transmite força, beleza e serenidade. Produzida com detalhes ricos, retrata Iemanjá com braços erguidos, vestida em tons de azul e adornada com conchas e estrelas-do-mar, simbolizando sua conexão com o oceano e a energia feminina.

            Características:
            • Material: [Material da escultura, se souber]
            • Acabamento: Detalhado, colorido
            • Itens inclusos: 1 escultura
            • Indicações de uso: Decoração, altares, devoção',
            'imagem' => 'produtos/iemanja.jpg',
            'categoria' => 'Imagens',
        ]);

        Produto::create([
            'nome' => 'Kit de Proteção',
            'preco' => 300.90,
            'estoque' => 2,
            'descricao' => 'O Kit representa elegância, proteção e vitalidade. Com detalhes ricos, mostra uma figura em branco e vermelho, adornada com colares preto, vermelho e branco, transmitindo equilíbrio e força. Elementos como vela bicolor, garrafa e copo reforçam celebração, transformação e abertura de caminhos.

            Características:
            • Acabamento: Detalhado, colorido
            • Itens inclusos: 1 escultura, 1 vela bicolor, 1 copo decorado e acessórios complementares
            • Indicações de uso: Decoração, altares, firmezas, oferendas e rituais de energia e proteção',
            'imagem' => 'produtos/proteção.jpg',
            'categoria' => 'Kits',
        ]);
    }

    
}
