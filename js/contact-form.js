$('#contactSuccess').hide();

$('#name-input').popover({trigger: 'manual', title: 'Erreur', content: 'Ce champ ne peut être vide', placement: 'top'});
$('#phone-input').popover({trigger: 'manual', title: 'Erreur', content: 'Numéro Incorrect', placement: 'top'});
$('#email-input').popover({trigger: 'manual', title: 'Erreur', content: 'Adresse e-mail incorrect', placement: 'top'});
$('#message-input').popover({trigger: 'manual', title: 'Erreur', content: 'Ce champ ne peut être vide', placement: 'right'});

let isHuman = false;
let nameValid = false;
let phoneValid = false;
let emailValid = false;
let messageValid = false;

let nameWasTouched = false;
let phoneWasTouched = false;
let emailWasTouched = false;
let messageWasTouched = false;

const isValid = () => {
  return isHuman && nameValid && phoneValid && emailValid && messageValid;
};

const checkAll = () => {
  check_name();
  if (nameValid) {
    check_phone();
    if (phoneValid) {
      check_email();
      if (emailValid) {
        check_message();
      }
    }
  }
};

const check_name = () => {
  if ($("#name-input").val().length > 0) {
    $('#name-input').popover('hide');
    nameValid = true;
  } else {
    $('#name-input').popover('show');
    nameValid = false;
  }
};

const check_phone = () => {
  var pattern = new RegExp(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g);

  if ($("#phone-input").val().length === 0 || ($("#phone-input").val().length > 7 && pattern.test($("#phone-input").val()))) {
    $('#phone-input').popover('hide');
    phoneValid = true;
  } else {
    $('#phone-input').popover('show');
    phoneValid = false;
  }
};

const check_email = () => {
  var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

  if ($("#email-input").val().length > 7 && pattern.test($("#email-input").val())) {
    $('#email-input').popover('hide');
    emailValid = true;
  } else {
    $('#email-input').popover('show');
    emailValid = false;
  }
};

const check_message = () => {
  if ($("#message-input").val().length > 0) {
    $('#message-input').popover('hide');
    messageValid = true;
  } else {
    $('#message-input').popover('show');
    messageValid = false;
  }
};

$("#name-input").focusout(() => {
  check_name();
  nameWasTouched = true;
});

$("#phone-input").focusout(() => {
  check_phone();
  phoneWasTouched = true;
});

$("#email-input").focusout(() => {
  check_email();
  emailWasTouched = true;
});

$("#message-input").focusout(() => {
  check_message();
  messageWasTouched = true;
});

$("#name-input").keyup(() => {
  if (nameWasTouched) {
    check_name();
  }
});

$("#phone-input").keyup(() => {
  if (phoneWasTouched) {
    check_phone();
  }
});

$("#email-input").keyup(() => {
  if (emailWasTouched) {
    check_email();
  }
});

$("#message-input").keyup(() => {
  if (messageWasTouched) {
    check_message();
  }
});

// Wait for a mouse to move, indicating they are human.
$('body').mousemove(function () {
  // Unlock the form.
  isHuman = true;
});

// Wait for a touch move event, indicating that they are human.
$('body').on('touchmove', function () {
  // Unlock the form.
  isHuman = true;
});

// A tab or enter key pressed can also indicate they are human.
$('body').keydown(function (e) {
  if ((e.keyCode === 9) || (e.keyCode === 13)) {
    // Unlock the form.
    isHuman = true;
  }
});

// POST form data to zapier on submit
$('#contactForm').submit(function(e){
  e.preventDefault();

  checkAll();
  if (isValid()) {
    $.ajax({
      url:'https://hooks.zapier.com/hooks/catch/4501492/p34aq4/',
      type:'post',
      data:$('#contactForm').serialize(),
      success:function(){
      // Transform to success
        $('#contact').hide();
        $('#contactSuccess').show();
      }
    });
  }
});