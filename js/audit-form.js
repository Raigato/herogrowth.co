$('#firstname-input').popover({trigger: 'manual', title: 'Erreur', content: 'Ce champ ne peut être vide', placement: 'top'})
$('#lastname-input').popover({trigger: 'manual', title: 'Erreur', content: 'Ce champ ne peut être vide', placement: 'top'})
$('#company-input').popover({trigger: 'manual', title: 'Erreur', content: 'Ce champ ne peut être vide', placement: 'top'})
$('#phone-input').popover({trigger: 'manual', title: 'Erreur', content: 'Numéro Incorrect', placement: 'left'})
$('#email-input').popover({trigger: 'manual', title: 'Erreur', content: 'Adresse e-mail incorrect', placement: 'right'})
$('#message-input').popover({trigger: 'manual', title: 'Erreur', content: 'Ce champ ne peut être vide', placement: 'right'})

let isHuman = false
let firstnameValid = false
let lastnameValid = false
let companyValid = false
let phoneValid = false
let emailValid = false
let messageValid = false

let firstnameWasTouched = false
let lastnameWasTouched = false
let companyWasTouched = false
let phoneWasTouched = false
let emailWasTouched = false
let messageWasTouched = false

const isValid = () => {
  return isHuman && firstnameValid && lastnameValid && companyValid && phoneValid && emailValid && messageValid
}

const checkAll = () => {
  check_firstname()
  if (firstnameValid) {
    check_lastname()
    if (lastnameValid) {
      check_company()
      if (companyValid) {
        check_phone()
        if (phoneValid) {
          check_email()
          if (messageValid) {
            check_message()
          }
        }
      }
    }
  }
}

const check_firstname = () => {
  if ($("#firstname-input").val().length > 0) {
    $('#firstname-input').popover('hide')
    firstnameValid = true
  } else {
    $('#firstname-input').popover('show')
    firstnameValid = false
  }
}

const check_lastname = () => {
  if ($("#lastname-input").val().length > 0) {
    $('#lastname-input').popover('hide')
    lastnameValid = true
  } else {
    $('#lastname-input').popover('show')
    lastnameValid = false
  }
}

const check_company = () => {
  if ($("#company-input").val().length > 0) {
    $('#company-input').popover('hide')
    companyValid = true
  } else {
    $('#company-input').popover('show')
    companyValid = false
  }
}

const check_phone = () => {
  var pattern = new RegExp(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g)

  if ($("#phone-input").val().length === 0 || ($("#phone-input").val().length > 7 && pattern.test($("#phone-input").val()))) {
    $('#phone-input').popover('hide')
    phoneValid = true
  } else {
    $('#phone-input').popover('show')
    phoneValid = false
  }
}

const check_email = () => {
  var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i)

  if ($("#email-input").val().length > 7 && pattern.test($("#email-input").val())) {
    $('#email-input').popover('hide')
    emailValid = true
  } else {
    $('#email-input').popover('show')
    emailValid = false
  }
}

const check_message = () => {
  if ($("#message-input").val().length > 0) {
    $('#message-input').popover('hide')
    messageValid = true
  } else {
    $('#message-input').popover('show')
    messageValid = false
  }
}

$("#firstname-input").focusout(() => {
  check_firstname()
  firstnameWasTouched = true
})

$("#lastname-input").focusout(() => {
  check_lastname()
  lastnameWasTouched = true
})

$("#company-input").focusout(() => {
  check_company()
  companyWasTouched = true
})

$("#phone-input").focusout(() => {
  check_phone()
  phoneWasTouched = true
})

$("#email-input").focusout(() => {
  check_email()
  emailWasTouched = true
})

$("#message-input").focusout(() => {
  check_message()
  messageWasTouched = true
})

$("#firstname-input").keyup(() => {
  if (firstnameWasTouched) {
    check_firstname()
  }
})

$("#lastname-input").keyup(() => {
  if (lastnameWasTouched) {
    check_lastname()
  }
})

$("#company-input").keyup(() => {
  if (companyWasTouched) {
    check_company()
  }
})

$("#phone-input").keyup(() => {
  if (phoneWasTouched) {
    check_phone()
  }
})

$("#email-input").keyup(() => {
  if (emailWasTouched) {
    check_email()
  }
})

$("#message-input").keyup(() => {
  if (messageWasTouched) {
    check_message()
  }
})

// Wait for a mouse to move, indicating they are human.
$('body').mousemove(function () {
  // Unlock the form.
  isHuman = true
})

// Wait for a touch move event, indicating that they are human.
$('body').on('touchmove', function () {
  // Unlock the form.
  isHuman = true
})

// A tab or enter key pressed can also indicate they are human.
$('body').keydown(function (e) {
  if ((e.keyCode === 9) || (e.keyCode === 13)) {
    // Unlock the form.
    isHuman = true
  }
})

// POST form data to zapier on submit
$('#auditForm').submit(function(e){
  e.preventDefault();

  checkAll()
  if (isValid()) {
    $.ajax({
      url:'https://hooks.zapier.com/hooks/catch/4501492/p3h27o/',
      type:'post',
      data:$('#auditForm').serialize(),
      success:function(){
      // Redirect to another success page
      window.location = "audit";
      }
    })
  }
})