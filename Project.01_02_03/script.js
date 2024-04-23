const form = document.getElementById("contact-form");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("message");
const nameError = document.getElementById("name-error");
const emailError = document.getElementById("email-error");
const messageError = document.getElementById("message-error");

form.addEventListener("submit", function(event) {
  event.preventDefault();

  let isValid = true;

  if (nameInput.value.trim() === "") {
    nameError.textContent = "Name is required.";
    isValid = false;
  } else {
    nameError.textContent = "";
  }

  if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(emailInput.value)) {
    emailError.textContent = "Invalid email address.";
    isValid = false;
  } else {
    emailError.textContent = "";
  }

  if (messageInput.value.trim() === "") {
    messageError.textContent = "Message is required.";
    isValid = false;
  } else {
    messageError.textContent = "";
  }

  if (isValid) {
    const formData = new FormData(form);
     const name = formData.get("name");
     const email = formData.get("email");
     const message = formData.get("message");
 
     alert(Name: ${name}\nEmail: ${email}\nMessage: ${message});

     nameInput.value = "";
     emailInput.value = "";
     messageInput.value = "";
   }
 });