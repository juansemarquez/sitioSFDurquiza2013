function divisiones(curso) {
    if (curso.value==0 || curso.value=="D" || curso.value=="X") {        
        document.getElementById("division").style.display="none";
        document.getElementById("division").disabled=true;
    }
    else {
        document.getElementById("division").style.display="inline";
        document.getElementById("division").innerHTML="<option value='0'>--Elegir--</option>";
        document.getElementById("division").innerHTML+="<option value='1'>1ª</option>\n";
        document.getElementById("division").innerHTML+="<option value='2'>2ª</option>\n";
        document.getElementById("division").innerHTML+="<option value='3'>3ª</option>\n";
        document.getElementById("division").disabled=false;
        if(curso.value<3) {
            document.getElementById("division").innerHTML+="<option value='4'>4ª</option>\n";
            document.getElementById("division").innerHTML+="<option value='5'>5ª</option>\n";            
        }
        if(curso.value==1) {
            document.getElementById("division").innerHTML+="<option value='6'>6ª</option>\n";
        }
    }    
}

function mail(email) {
    if (email.value.length==0) {
        document.getElementById("noticias").disabled=true;
    }
    else {
        document.getElementById("noticias").disabled=false;
    }            
}

function mostrarFormulario(mostrar) {
        if(mostrar) {
            document.getElementById("formulario").style.display="block";
            document.body.style.backgroundColor="#333333";
            document.getElementById("fijo").style.backgroundColor="#333333";
        }
        else {
            document.getElementById("formulario").style.display="none";
            document.body.style.backgroundColor="#f1f1f1";
            document.getElementById("fijo").style.backgroundColor="#f1f1f1";
        }
}

function enviarDatos(f) {
    var result=true;
    if(f.nombre.value.length==0) {
        document.getElementById("nombrelbl").style.color="red";
        result=false;
    }
    else {
        document.getElementById("nombrelbl").style.color="black";
    }
    if(f.apellido.value.length==0) {
        document.getElementById("apellidolbl").style.color="red";
        result=false;
    }
    else {
        document.getElementById("apellidolbl").style.color="black";
    }
    if(f.curso.value==0 || ((f.curso.value==1||f.curso.value==2||f.curso.value==3)&&(f.division.value==0)))  {
        document.getElementById("cursolbl").style.color="red";
        result=false;
    }
    else {
        document.getElementById("cursolbl").style.color="black";
    }
    if(f.correo.value.length==0) {
        document.getElementById("correolbl").style.color="red";
        result=false;
    }
    else {
        document.getElementById("correolbl").style.color="black";
    }
    return result;
}
