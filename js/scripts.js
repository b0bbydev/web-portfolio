/*!
 * Obtained from:
 * Start Bootstrap - Freelancer v7.0.2 (https://startbootstrap.com/theme/freelancer)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
 */

window.addEventListener("DOMContentLoaded", (event) => {
  // Navbar shrink function
  var navbarShrink = function () {
    const navbarCollapsible = document.body.querySelector("#mainNav");
    if (!navbarCollapsible) {
      return;
    }
    if (window.scrollY === 0) {
      navbarCollapsible.classList.remove("navbar-shrink");
    } else {
      navbarCollapsible.classList.add("navbar-shrink");
    }
  };

  // Shrink the navbar
  navbarShrink();

  // Shrink the navbar when page is scrolled
  document.addEventListener("scroll", navbarShrink);

  // Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector("#mainNav");
  if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
      target: "#mainNav",
      offset: 72,
    });
  }

  // Collapse responsive navbar when toggler is visible
  const navbarToggler = document.body.querySelector(".navbar-toggler");
  const responsiveNavItems = [].slice.call(
    document.querySelectorAll("#navbarResponsive .nav-link")
  );
  responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener("click", () => {
      if (window.getComputedStyle(navbarToggler).display !== "none") {
        navbarToggler.click();
      }
    });
  });
});

// Wait for the DOM to be ready
$(document).ready(function () {
  // Initialize form validation on the registration form.
  // It has the name attribute "form"
  $("form[name='form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      message: {
        required: true,
        minlength: 5,
      },
      email: {
        required: true,
        email: true,
      },
      name: {
        required: true,
        minlength: 3,
      },
    },
    // Specify validation error messages
    messages: {
      name: "Must be at least 3 characters",
      email: "Please enter a valid email address",
      message: "Must be at least 5 characters",
    },

    // disable the submitButton until the form is valid.
    success: function () {
      if ($("#contactForm").validate().checkForm()) {
        $("#submitButton").removeClass("disabled").prop("disabled", false); // enables button
      }
    },

    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function (form) {
      form.submit(form);
    },
  });
});

// the submitButton is only clickable when the form is valid, once it's valid - display a success message.
$("#submitButton").on("click", function () {
  Swal.fire({
    icon: 'success',
    title: 'Great!',
    text: 'Your message was sent!',
    timer: 2000
  })
});
