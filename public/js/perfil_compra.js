
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

//   function guardarNota(){
//     //   console.log('diste click');

//    let id = document.getElementById('idEditar').value;
//    let clienteEditar = document.getElementById('clienteEditar').value;
//    let adminEditar = document.getElementById('adminEditar').value;
//    let capacidad_compraEditar = document.getElementById('capacidad_compraEditar').value;
//    let descuentoEditar = document.getElementById('descuentoEditar').value;
//    let reembolsoEditar = document.getElementById('reembolsoEditar').value;
//    let notaEditar = document.getElementById('notaEditar').value;


// console.log(clienteEditar);
// console.log(adminEditar);
// console.log(capacidad_compraEditar);
// console.log(descuentoEditar);
// console.log(reembolsoEditar);
// console.log(notaEditar);



//    const data = new FormData();
//     data.append('id_cliente', clienteEditar );
//     data.append('id_admin',   adminEditar );
//     data.append('capacidad_compra', capacidad_compraEditar   );
//     data.append('des_mensual',   descuentoEditar );
//     data.append('reembolso',   reembolsoEditar );
//     data.append('nota',   notaEditar );
//     console.log(id);

//    fetch(`/nota/${id}`,{
//        method:'PUT',
//        body: data,
//        headers:{
//       'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
//        },
//    }
// ).then(function(respuesta) {
//     return respuesta.json();
//   })
//   .then(function(myJson) {
//     console.log(myJson);


//   });

//   }
