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
            iC.innerHTML = colaborador.ID; 
			nomeColuna.innerHTML = colaborador.NOMECOLAB;
			emailColuna.innerHTML = colaborador.EMAILCOLAB;
            telefoneColuna.innerHTML = colaborador.TELEFONECOLAB;
            alterarColuna.innerHTML = '<div class="d-flex justify-content-around"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"><i class="material-icons">Alterar</i></button></div>';
		})
	}).catch(error => console.error(error))
}

function postFormUsuario(){
    var form = document.querySelector('#CadastrarUser');
    var data = {};
    data['nome'] = form.nome.value;
    data['email'] = form.email.value;
	data['telefone'] = form.telefone.value;
	console.log(JSON.stringify(data));
    fetch('http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/colaborador',{
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

		alert("Usuário inserido com sucesso");
	 console.log(data);
	})
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