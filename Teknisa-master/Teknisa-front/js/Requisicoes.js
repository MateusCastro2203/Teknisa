window.onload = function(e) {
	fetch(
		'http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/colaborador', {		
		}).then(response => response.json())				
	.then(data => { 
		console.log(data);
		data.forEach(colaborador => {  
			var table = document.getElementById("tableUser");
            var row = table.insertRow(-1);
            var iC = row.insertCell(0);
			var nomeColuna = row.insertCell(1); 
			var emailColuna = row.insertCell(2); 
            var telefoneColuna = row.insertCell(3); 
            var alterarColuna = row.insertCell(4);
            iC.innerHTML = colaborador.idcolab; 
			nomeColuna.innerHTML = colaborador.nome;
			emailColuna.innerHTML = colaborador.email;
            telefoneColuna.innerHTML = colaborador.telefone;
            alterarColuna.innerHTML = '<div class="d-flex justify-content-around"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"><i class="material-icons">Alterar</i></button><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="material-icons">Deletar</i></button></div>';
		})
	}).catch(error => console.error(error))
}

function postFormUsuario(){
    var form = document.querySelector('#CadastrarUser');
    var data = {};
    data['nome'] = form.nome.value;
    data['email'] = form.email.value;
    data['telefone'] = form.telefone.value;
    fetch('http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/colaborador' ,{
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
	.then((data) => console.log(data))
	.catch(err => console.log('Error message:', err.statusText));
}



function updateFormUser() {
	var form = document.querySelector('#alterarUser');
    var data = {};
    
	data['nome'] = form.nome.value
	data['email'] = form.email.value;
	data['telefone'] = form.telefone.value;
    fetch('http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/colaborador' ,{
        method: 'PUT',
        body: JSON.stringify(data)
    })
    .then((response) => {
		if (response.ok) {
			return response.json() 
		} else {
			return Promise.reject({ status: res.status, statusText: res.statusText });
		}   

	})
	.then((data) => console.log(data))
	.catch(err => console.log('Error message:', err.statusText));
}


function postFormSala(){
    var form = document.querySelector('#cadastrarSala');
    var data = {};
    data['nomeSala'] = form.nomeSala.value;
    data['cadeiras'] = form.cadeiras.value;
    data['possuipc'] = form.possuipc.value;
    data['possuiproj'] = form.possuiproj.value;
    data['possuivideo'] = form.possuivideo.value;
    fetch('http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/sala' ,{
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
	.then((data) => console.log(data))
	.catch(err => console.log('Error message:', err.statusText));
}

function go() {
	window.history.go();
}

