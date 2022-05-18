
function anadirFormulario(){
    $('#botonBorrar').remove()
    $('#formulario').append(
            "<input type='text' name='nombreCasa' placeholder='Nombre de la casa' class='form-control  mt-2 rounded text-center rellenando'>"+
            "<input type='text' name='direccionCasa' placeholder='Direccion' class='form-control mt-2 rounded text-center rellenando'>"+
            "<input type='text' name='localidadCasa' placeholder='Localidad' class='form-control mt-2 rounded text-center rellenando'>"+
            "<input type='text' name='aforoCasa' placeholder='Aforo' class='form-control mt-2 rounded text-center rellenando'>"+
            "</div>"+
            "<div class='mt-3'>"+
            "<label class='form-label text-light text-center w-100 fw-bold'>Descripción de la casa:</label>"+
            "<textarea name='descripcionCasa' id='' cols='40' rows='5'></textarea>"+
            "<div class='mt-5'>"+
            "<label for='fotosCasa' class='form-label text-light text-center w-100 fw-bold'>Subir imagenes de la casa (Max: 10)</label>"+
            "<input class='form-control-file d-flex align-self-center' type='file' name='fotosCasa[]' id='fotosCasa[]' multiple accept='image/*'></div>"+
            "<div >"+
            "<button id='botonAnadir' class='btn btn-light'>Vincular casa.</button>"+
            "</div>")
}
function comprobarFormulario(){
    
}

const btnAnadirForm=document.getElementById("botonBorrar")

btnAnadirForm.addEventListener("click", anadirFormulario)



const botonFormulario=document.getElementById("botonAnadir")

botonFormulario.addEventListener("click", comprobarFormulario)


