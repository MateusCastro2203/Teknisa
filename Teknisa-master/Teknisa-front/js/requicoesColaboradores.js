function EntrarUsuario(){

	
	var form = document.getElementById('logar');
    var data = {};
    data['email'] = form.email.value ;

	fetch('http://localhost/Teknisa/Teknisa-master/Teknisa-Desafio/colaborador', {
		method: 'GET',
        body: JSON.stringify(data)
	})
	.then((response) => {
		if (response.ok) {
			alert('funcionou');
			return response.json() 
		} else {
			alert('Erro')
			return Promise.reject({ status: res.status, statusText: res.statusText });
		}   

	})
	.then((email) => console.log(email))
	.catch(err => console.log('Error message:', err.statusText));
}
