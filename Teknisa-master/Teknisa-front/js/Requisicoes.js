function postFormSala(){
    var form = document.querySelector('#cadastrarSala');
    var data = {};
    data['nome'] = form.nomeSala.value;
    data['quantCad'] = form.cadeiras.value;
    data['contComp'] = form.possuipc.value;
    data['contProj'] = form.possuiproj.value;
	data['contVideoChamada'] = form.possuivideo.value;
	console.log(data);
    fetch('http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/sala',{
        method: 'POST',
        body: JSON.stringify(data)
    })
    .then((response) => {
		if (response.ok) {
			return response.json() 
		} else {
			return Promise.reject({ status: res.status, statusText: res.statusText });
		}   

	})
	.then((data) => {
		console.log(data);
		alert("Ddaos INSERIDOS COM SUCESSO");
	})
	.catch(err => console.log('Error message:', err.statusText));
}

window.onload = function(e) {
	fetch(
		'http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/sala', {		
		}).then(response => response.json())				
	.then(data => { 
		console.log(data);
		data.forEach(sala => {  
			var table = document.getElementById("Salas");
            var row = table.insertRow(-1);
            var nome = row.insertCell(0);
			var cadeiras = row.insertCell(1); 
			var computador = row.insertCell(2); 
            var projetor = row.insertCell(3); 
            var video = row.insertCell(4);
            nome.innerHTML = sala.NOMESALA; 
			cadeiras.innerHTML = sala.QUANTCAD;
			computador.innerHTML = sala.COMPUTADOR;
            projetor.innerHTML = sala.PROJETOR;
            video.innerHTML =sala.VIDEOCHAMADA ;
		})
	}).catch(error => console.error(error))
}

function go() {
	window.history.go();
}

