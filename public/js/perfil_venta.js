
  document.querySelector('#btneditarnota').addEventListener('click', obtenerNota);
  // document.querySelector('#guardarNota').addEventListener('click', guardarNota);

  function obtenerNota(){
    //   console.log('diste click');
   let id = document.getElementById('id-editar').value


   fetch(`/seguimiento/${id}`,{
       method: 'POST',
       headers:{
      'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
       },
   }
).then(function(respuesta) {
    return respuesta.json();
  })
  .then(function(myJson) {
    console.log(myJson);

    document.querySelector('#clienteEditar').value = myJson.id_cliente;
    document.querySelector('#adminEditar').value = myJson.id_admin;
    document.querySelector('#capacidad_compraEditar').value = myJson.capacidad_compra;
    document.querySelector('#descuentoEditar').value = myJson.des_mensual;
    document.querySelector('#reembolsoEditar').value = myJson.reembolso;
    document.querySelector('#notaEditar').value = myJson.nota;
    document.querySelector('#idEditar').value = myJson.id;

  });

  }

