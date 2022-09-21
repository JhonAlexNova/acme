$(function () {
      
    $('#quickForm').validate({
      rules: {
        numero_cedula: {
          required: true
        },
        primer_nombre: {
          required: true
        },
        apellidos: {
          required: true
        },
        direccion: {
          required: true
        },
        telefono: {
          required: true
        },
        ciudad: {
          required: true
        }
      },
      messages: {
        numero_cedula: {
          required: "El campo Numero de cedula es requerido",
        },
        primer_nombre: {
          required: "El campo Primer nombre es requerido",
        },
        apellidos: {
          required: "El campo Apellido es requerido",
        },
        direccion: {
          required: "El campo Direccion es requerido",
        },
        telefono: {
          required: "El campo Telefono es requerido",
        },
        ciudad: {
          required: "El campo Ciudad es requerido",
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });