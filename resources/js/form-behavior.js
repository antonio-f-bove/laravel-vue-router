/**
 * function wrapper for querySelectorAll -> buttons
 * @param {string} formAction - what kind of action the button submits (eg. delete, store, ecc)
 * @return {NodeList} - the button elements
 */
function qsaBtns(formAction) {

  return document.querySelectorAll(`.${formAction}-form [type=submit]`); 
}

/**
 * queries the clicked buttons and prevents default behavior, then asks confiration to user
 * @param {string} formAction - what kind of action the button submits (eg. delete, store, ecc)
 */
function preventAndConfirm(formAction) {

  const buttons = qsaBtns(formAction);

  buttons.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();

      if (confirm(`Do you really want to ${formAction} this post?`)) {
        const form = e.target.closest(`.${formAction}-form`);
        form.submit();
      }
    });
  });
}

// add here the form actions to customize behavior of their associated submit buttons
const formActions = [
  'publish',
  'delete',
];

formActions.forEach(action => {
  preventAndConfirm(action);
})