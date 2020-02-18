import {
  required,
  email,
  minLength,
  maxLength,
  alpha,
  helpers
} from "vuelidate/lib/validators";
const phone = helpers.regex(
  "phone",
  /^\([1-9]{2}\) (?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$/
);
export default {
  name: {
    required,
    alpha,
    maxLength: maxLength(100),
    minLength: minLength(5)
  },
  email: {
    required,
    email,
    maxLength: maxLength(100)
  },
  phone: {
    required,
    phone
  },
  message: {
    required
  },
  file: {
    required
  }
}