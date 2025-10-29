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

        Produto::create([
            'nome' => 'Cristal de Ametista Rolado',
            'preco' => 22.00,
            'estoque' => 16,
            'descricao' => 'A Ametista é o cristal da espiritualidade e da proteção energética. Suas vibrações elevadas ajudam a equilibrar emoções, fortalecer a intuição e purificar ambientes espirituais.

            Características:
            • Tipo: Rolado
            • Cor: Roxo translúcido
            • Tamanho: 3 a 4 cm
            • Indicações de uso: Meditação, proteção e equilíbrio emocional',
            'imagem' => 'produtos/exemplo.jpg',
            'categoria' => 'Cristais',
        ]);

        Produto::create([
            'nome' => 'Quartzo Rosa Bruto',
            'preco' => 25.00,
            'estoque' => 10,
            'descricao' => 'O Quartzo Rosa é o cristal do amor, da harmonia e da compaixão. Suas energias sutis promovem paz interior, empatia e autoestima.

            Características:
            • Tipo: Bruto natural
            • Cor: Rosa-claro
            • Tamanho: 5 cm
            • Indicações de uso: Alinhamento emocional, amor próprio e harmonia espiritual',
            'imagem' => 'produtos/exemplo.jpg',
            'categoria' => 'Cristais',
        ]);

Produto::create([
    'nome' => 'Cristal de Citrino Natural',
    'preco' => 29.90,
    'estoque' => 12,
    'descricao' => 'O Citrino é o cristal da prosperidade e alegria. Estimula a criatividade, clareza mental e abundância financeira.

    Características:
    • Tipo: Natural
    • Cor: Amarelo dourado
    • Tamanho: 4 cm
    • Indicações de uso: Prosperidade e equilíbrio energético',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Cristais',
]);

Produto::create([
    'nome' => 'Erva de Arruda Desidratada',
    'preco' => 14.00,
    'estoque' => 15,
    'descricao' => 'A Arruda é conhecida por seu poder de proteção espiritual e limpeza energética. Muito usada em banhos e defumações.

    Características:
    • Tipo: Erva desidratada
    • Peso: 50g
    • Indicações de uso: Banhos, defumações e firmezas de proteção',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Ervas',
]);

Produto::create([
    'nome' => 'Mistura de Ervas para Limpeza Energética',
    'preco' => 26.90,
    'estoque' => 8,
    'descricao' => 'Blend de ervas naturais selecionadas para purificar ambientes e afastar más influências. Ideal para defumações.

    Características:
    • Composição: Alecrim, guiné, arruda e alfazema
    • Peso: 100g
    • Indicações de uso: Limpeza espiritual e purificação de espaços',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Ervas',
]);

Produto::create([
    'nome' => 'Banho de Ervas Pronto – Equilíbrio',
    'preco' => 24.90,
    'estoque' => 9,
    'descricao' => 'Banho ritualístico preparado com ervas naturais para restaurar a harmonia e o equilíbrio energético.

    Características:
    • Conteúdo: 250 ml
    • Composição: Alfazema, manjericão e alecrim
    • Indicações de uso: Banho energético e meditação',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Ervas',
]);

Produto::create([
    'nome' => 'Miçangas Pretas e Brancas',
    'preco' => 18.90,
    'estoque' => 20,
    'descricao' => 'Miçangas em vidro resistentes e de brilho intenso. Muito usadas para confecção de guias, pulseiras e colares espirituais.

    Características:
    • Material: Vidro
    • Quantidade: 100g
    • Indicações de uso: Artesanato religioso e firmezas espirituais',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Miçangas',
]);

Produto::create([
    'nome' => 'Miçangas Vermelhas e Brancas',
    'preco' => 18.90,
    'estoque' => 22,
    'descricao' => 'Miçangas de vidro com brilho intenso nas cores vermelha e branca. Representam vitalidade, equilíbrio e fé.

    Características:
    • Material: Vidro
    • Quantidade: 100g
    • Indicações de uso: Confecção de colares, guias e firmezas espirituais',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Miçangas',
]);

Produto::create([
    'nome' => 'Miçangas Azuis e Brancas',
    'preco' => 18.90,
    'estoque' => 18,
    'descricao' => 'Miçangas nas cores azul e branca, ideais para confecção de colares e guias dedicadas a entidades de paz e equilíbrio.

    Características:
    • Material: Vidro
    • Quantidade: 100g
    • Indicações de uso: Guías espirituais e artesanato religioso',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Miçangas',
]);

Produto::create([
    'nome' => 'Vela 7 Cores (Kit Completo)',
    'preco' => 28.90,
    'estoque' => 7,
    'descricao' => 'Kit com 7 velas coloridas, representando as linhas espirituais e forças da natureza. Ideal para firmezas e orações semanais.

    Características:
    • Itens inclusos: 7 velas (branca, azul, vermelha, verde, amarela, roxa e rosa)
    • Altura: 15 cm cada
    • Indicações de uso: Firmezas, orações e rituais espirituais',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Velas',
]);

Produto::create([
    'nome' => 'Vela Azul Clara – Paz e Serenidade',
    'preco' => 6.90,
    'estoque' => 25,
    'descricao' => 'A Vela Azul simboliza paz e harmonia. Utilizada em orações e firmezas para tranquilizar a mente e o coração.

    Características:
    • Material: Parafina
    • Altura: 15 cm
    • Cor: Azul clara
    • Indicações de uso: Orações e rituais de paz',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Velas',
]);

Produto::create([
    'nome' => 'Kit de Cristais da Prosperidade',
    'preco' => 69.90,
    'estoque' => 5,
    'descricao' => 'Conjunto com 5 pedras energéticas voltadas para atrair prosperidade e equilíbrio financeiro. Ideal para altares e meditação.

    Características:
    • Pedras: Citrino, Pirita, Jade, Aventurina e Quartzo Verde
    • Itens inclusos: 5 cristais e bolsa de algodão
    • Indicações de uso: Prosperidade e alinhamento energético',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Kits',
]);

Produto::create([
    'nome' => 'Kit Banho de Ervas – Proteção e Limpeza',
    'preco' => 59.90,
    'estoque' => 6,
    'descricao' => 'Kit ritualístico com ervas, sal grosso e essência natural. Ideal para banhos de limpeza e fortalecimento espiritual.

    Características:
    • Itens inclusos: Ervas secas, sal grosso e essência aromática
    • Indicações de uso: Banhos e rituais de proteção',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Kits',
]);

Produto::create([
    'nome' => 'Imagem de Ogum em Resina',
    'preco' => 99.90,
    'estoque' => 4,
    'descricao' => 'Imagem de Ogum, Orixá da guerra e da vitória. Produzida em resina de alta qualidade com pintura artesanal detalhada.

    Características:
    • Material: Resina
    • Altura: 22 cm
    • Indicações de uso: Altares, firmezas e oferendas',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Imagens',
]);

Produto::create([
    'nome' => 'Imagem de Oxum Dourada',
    'preco' => 119.90,
    'estoque' => 3,
    'descricao' => 'Escultura de Oxum, Orixá das águas doces e da beleza. Representa amor, prosperidade e feminilidade divina.

    Características:
    • Material: Resina com pintura dourada
    • Altura: 20 cm
    • Indicações de uso: Altares e oferendas de amor e prosperidade',
    'imagem' => 'produtos/exemplo.jpg',
    'categoria' => 'Imagens',
]);

    }

    
}
