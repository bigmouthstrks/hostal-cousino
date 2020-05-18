var max_caracteres = 200;
var mensaje_input = document.getElementById("mensaje");
var caracteres_restantes = document.getElementById("CaracteresRestantes");

caracteres_restantes.innerHTML = max_caracteres;

mensaje_input.addEventListener("keydown",contar);

function contar(e){
	var cant_caracteres = mensaje_input.value.length;
	if (cant_caracteres >= max_caracteres){
		e.preventDefault();
	} else{
		caracteres_restantes.innerHTML = max_caracteres - (cant_caracteres-1);
	}
}

