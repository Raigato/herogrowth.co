$('#firstnameError').hide()
$('#lastnameError').hide()
$('#companyError').hide()
$('#phoneError').hide()
$('#emailError').hide()
$('#messageError').hide()

let isHuman = false
let firstnameValid = false
let lastnameValid = false
let companyValid = false
let phoneValid = false
let emailValid = false
let messageValid = false

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
    $('#firstnameError').hide()
    firstnameValid = true
  } else {
    $('#firstnameError').show()
    firstnameValid = false
  }
}

const check_lastname = () => {
  if ($("#lastname-input").val().length > 0) {
    $('#lastnameError').hide()
    lastnameValid = true
  } else {
    $('#lastnameError').show()
    lastnameValid = false
  }
}

const check_company = () => {
  if ($("#company-input").val().length > 0) {
    $('#companyError').hide()
    companyValid = true
  } else {
    $('#companyError').show()
    companyValid = false
  }
}

const check_phone = () => {
  var pattern = new RegExp(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g)

  if ($("#phone-input").val().length === 0 || ($("#phone-input").val().length > 7 && pattern.test($("#phone-input").val()))) {
    $('#phoneError').hide()
    phoneValid = true
  } else {
    $('#phoneError').show()
    phoneValid = false
  }
}

const check_email = () => {
  var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i)

  if ($("#email-input").val().length > 7 && pattern.test($("#email-input").val())) {
    $('#emailError').hide()
    emailValid = true
  } else {
    $('#emailError').show()
    emailValid = false
  }
}

const check_message = () => {
  if ($("#message-input").val().length > 0) {
    $('#messageError').hide()
    messageValid = true
  } else {
    $('#messageError').show()
    messageValid = false
  }
}

$("#firstname-input").focusout(() => {
  check_firstname()
})

$("#lastname-input").focusout(() => {
  check_lastname()
})

$("#company-input").focusout(() => {
  check_company()
})

$("#phone-input").focusout(() => {
  check_phone()
})

$("#email-input").focusout(() => {
  check_email()
})

$("#message-input").focusout(() => {
  check_message()
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