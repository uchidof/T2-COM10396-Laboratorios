<?php
require_once "../includes/cabecalho.php";
?>

<h1>Laboratórios de TI</h1>

<div class="lab" onclick="moveToLocation('redes')">
    <h2>Laboratório de Redes de Computadores</h2>
    <p><strong>Objetivo:</strong> Desenvolver e testar redes de comunicação de dados.</p>
    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 08h00 - 18h00</p>
    <div class="details">
        <p><strong>Criação:</strong> Fundado em 2010 como parte da expansão do curso de Redes.</p>
        <p><strong>Importância:</strong> Essencial para capacitar os alunos na implementação e manutenção de redes
            seguras e eficientes, sendo um dos laboratórios mais utilizados por empresas para parcerias de inovação.</p>
    </div>
</div>

<div class="lab" onclick="moveToLocation('software')">
    <h2>Laboratório de Desenvolvimento de Software</h2>
    <p><strong>Objetivo:</strong> Criar e testar aplicações de software para diversas plataformas.</p>
    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 09h00 - 19h00</p>
    <div class="details">
        <p><strong>Criação:</strong> Estabelecido em 2012 para atender à crescente demanda por desenvolvimento de
            software no mercado local.</p>
        <p><strong>Importância:</strong> Crucial para a formação de programadores e desenvolvedores que impulsionam o
            setor de tecnologia com soluções inovadoras.</p>
    </div>
</div>

<div class="lab" onclick="moveToLocation('seguranca')">
    <h2>Laboratório de Segurança da Informação</h2>
    <p><strong>Objetivo:</strong> Analisar e implementar técnicas de segurança digital.</p>
    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 08h30 - 17h30</p>
    <div class="details">
        <p><strong>Criação:</strong> Inaugurado em 2015 em resposta à necessidade crescente de profissionais em
            cibersegurança.</p>
        <p><strong>Importância:</strong> Importante para preparar especialistas em segurança que lidam com os maiores
            desafios de proteção de dados na era digital.</p>
    </div>
</div>


<div class="lab" onclick="moveToLocation('ia')">
    <h2>Laboratório de Inteligência Artificial</h2>
    <p><strong>Objetivo:</strong> Pesquisa e desenvolvimento de algoritmos e aplicações de IA.</p>
    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 08h00 - 17h00</p>
    <div class="details">
        <p><strong>Criação:</strong> Fundado em 2018 com foco na pesquisa de aprendizado de máquina e inteligência
            artificial aplicada.</p>
        <p><strong>Importância:</strong> Importante para preparar pesquisadores e profissionais que desenvolvem soluções
            inovadoras em áreas como reconhecimento de padrões e automação.</p>
    </div>
</div>

<div class="lab" onclick="moveToLocation('programacao')">
    <h2>Laboratório de Programação</h2>
    <p><strong>Objetivo:</strong> Ensinar e desenvolver habilidades em programação para diversas linguagens e
        plataformas.</p>
    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, 09h00 - 18h00</p>
    <div class="details">
        <p><strong>Criação:</strong> Fundado em 2014 para atender à crescente demanda de profissionais qualificados em
            programação.</p>
        <p><strong>Importância:</strong> Essencial para capacitar os alunos a desenvolver soluções em software, jogos,
            automação e outras áreas tecnológicas, fomentando a inovação e empreendedorismo no setor.</p>
    </div>
</div>


<!-- Mapa de Localização -->
<h2>Mapa de Localização</h2>
<div id="map"></div>
</div>

</div>

<!-- Incluindo o JavaScript do Leaflet -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Inicializando o mapa com uma localização padrão
    var map = L.map('map').setView([-20.7614, -41.5377], 15);

    // Adicionando o tile layer do OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Adicionando um marcador inicial no mapa
    var marker = L.marker([-20.7614, -41.5377]).addTo(map)
        .bindPopup('Campus UFES, Alegre-ES')
        .openPopup();

    // Função para mover o mapa para a localização do laboratório selecionado
    function moveToLocation(laboratorio) {
        var locations = {
            'redes': {
                lat: -20.7613939,
                lng: -41.5366848,
                popup: 'Laboratório de Redes de Computadores',
                link: '../views/sala_redes.html' // Página de detalhes do laboratório de redes
            },
            'software': {
                lat: -20.7611927,
                lng: -41.5359173,
                popup: 'Laboratório de Desenvolvimento de Software',
                link: '../views/salas.html' // Página de detalhes do laboratório de software
            },
            'seguranca': {
                lat: -20.7612356,
                lng: -41.5367314,
                popup: 'Laboratório de Segurança da Informação',
                link: '../views/salas.html' // Página de detalhes do laboratório de segurança
            },
            'ia': {
                lat: -20.7621991,
                lng: -41.5364442,
                popup: 'Laboratório de Inteligência Artificial',
                link: '../views/salas.html' // Página de detalhes do laboratório de IA
            },
            'programacao': {
                lat: -20.7621991,
                lng: -41.5364442,
                popup: 'Laboratório de Programação',
                link: '../views/salas.html' // Página de detalhes do laboratório de programação
            },
        };

        var location = locations[laboratorio];
        map.setView([location.lat, location.lng], 16);

        // Atualizando o marcador com o popup que contém o link
        marker.setLatLng([location.lat, location.lng])
            .setPopupContent(`${location.popup} <br><a href="${location.link}" target="_blank">Ver mais detalhes</a>`)
            .openPopup();

        // Fazer o scroll suave para o mapa
        document.getElementById('map').scrollIntoView({ behavior: 'smooth' });
    }
</script>



<?php
require_once "../includes/rodape.php"
    ?>