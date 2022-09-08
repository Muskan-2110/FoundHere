// Only one form, so no specific name required
const form = document.querySelector("form");

// Add the novalidate attribute when the JS loads
form.setAttribute("novalidate", true);

// Validate the field
const hasError = field => {
  // Don't validate submits, buttons, and file inputs, and disabled fields
  if (
    field.disabled ||
    field.type === "file" ||
    field.type === "submit" ||
    field.type === "button"
  )
    return;

  // Get validity
  const validity = field.validity;

  // If valid, return null
  if (validity.valid) return;

  // If field is required and empty
  if (validity.valueMissing) return "Please fill out this field.";

  // If not the right type
  if (validity.typeMismatch) {
    // Email
    if (field.type === "email") return "Please enter an email address.";
  }

  // If too short
  if (validity.tooShort)
    return (
      "Please lengthen this text to " +
      field.getAttribute("minLength") +
      " characters or more. You are currently using " +
      field.value.length +
      " characters."
    );

  // If too long
  if (validity.tooLong)
    return (
      "Please shorten this text to no more than " +
      field.getAttribute("maxLength") +
      " characters. You are currently using " +
      field.value.length +
      " characters."
    );

  // If number input isn't a number
  if (validity.badInput) return "Please enter a number.";

  // If a number value doesn't match the step interval
  if (validity.stepMismatch) return "Please select a valid value.";

  // If a number field is over the max
  if (validity.rangeOverflow)
    return (
      "Please select a value that is no more than " +
      field.getAttribute("max") +
      "."
    );

  // If a number field is below the min
  if (validity.rangeUnderflow)
    return (
      "Please select a value that is no less than " +
      field.getAttribute("min") +
      "."
    );

  // If pattern doesn't match
  if (validity.patternMismatch) {
    // If pattern info is included, return custom error
    if (field.hasAttribute("title")) return field.getAttribute("title");

    // Otherwise, generic error
    return "Please match the requested format.";
  }

  // If all else fails, return a generic catchall error
  return "The value you entered for this field is invalid.";
};

// Show an error message
const showError = (field, error) => {
  // Add error class to field
  field.classList.add("error");

  // If the field is a radio button and part of a group, error all and get the last item in the group
  if (field.type === "radio" && field.name) {
    const group = document.getElementsByName(field.name);
    if (group.length > 0) {
      for (let i = 0; i < group.length; i++) {
        // Only check fields in current form
        if (group[i].form !== field.name) continue;
        group[i].classList.add("error");
      }
      field = group[group.length - 1];
    }
  }

  // Get field id or name
  const id = field.id || field.name;
  if (!id) return;

  // Check if error message field already exists
  // If not, create one
  let message = field.form.querySelector(".error-message#error-for-" + id);
  if (!message) {
    message = document.createElement("div");
    message.className = "error-message";
    message.id = "error-for-" + id;

    // If the field is a radio button or checkbox, insert error after the label
    let label;
    if (field.type === "radio" || field.type === "checkbox") {
      label =
        field.form.querySelector('label[for="' + id + '"]') || field.parentNode;
      if (label) {
        label.parentNode.insertBefore(message, label.nextSibling);
      }
    }

    // Otherwise, insert it after the field
    if (!label) {
      field.parentNode.insertBefore(message, field.nextSibling);
    }
  }

  // Add ARIA role to the field
  field.setAttribute("aria-describedby", "error-for-" + id);

  // Update error message
  message.innerHTML = error;

  // Show error message
  message.style.display = "block";
  message.style.visibility = "visible";
};

// Remove the error message
const removeError = field => {
  // Remove error class to field
  field.classList.remove("error");

  // Remove ARIA role from the field
  field.removeAttribute("aria-describedby");

  // If the field is a radio button and part of a group, remove error from all and get the last item in the group
  if (field.type === "radio" && field.name) {
    const group = document.getElementsByName(field.name);
    if (group.length > 0) {
      for (let i = 0; i < group.length; i++) {
        // Only check fields in current form
        if (group[i].form !== field.name) continue;
        group[i].classList.remove("error");
      }
      field = group[group.length - 1];
    }
  }

  // Get field id or name
  const id = field.id || field.name;
  if (!id) return;

  // Check if an error message is in the DOM
  let message = field.form.querySelector(".error-message#error-for-" + id + "");
  if (!message) return;

  // If so, hide it
  message.innerHTML = "";
  message.style.display = "none";
  message.style.visibility = "hidden";
};

// Listen to all blur events
document.addEventListener(
  "blur",
  function(event) {
    // Validate the field
    const error = hasError(event.target);

    // If there's an error, show it
    if (error) {
      showError(event.target, error);
      return;
    }

    // Otherwise, remove any existing error message
    removeError(event.target);
  },
  true
);

// Check all fields on submit
document.addEventListener(
  "submit",
  function(event) {
    // Get all of the form elements
    const fields = event.target.elements;

    // Validate each field
    // Store the first field with an error to a variable so we can bring it into focus later
    let error, hasErrors;
    for (let i = 0; i < fields.length; i++) {
      error = hasError(fields[i]);
      if (error) {
        showError(fields[i], error);
        if (!hasErrors) {
          hasErrors = fields[i];
        }
      }
    }

    // If there are errrors, don't submit form and focus on first element with error
    if (hasErrors) {
      event.preventDefault();
      hasErrors.focus();
    }

    // Otherwise, let the form submit normally
  },
  false
);

