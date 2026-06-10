/**
 * @param {HTMLElement} element
 * @param {string|string[]} tokens
 * @param {boolean} force
 */
const toggleClassList = (element, tokens, force) => {
  tokens = Array.isArray(tokens) ? tokens : [tokens];

  for (const token of tokens) {
    force === undefined
      ? element.classList.toggle(token)
      : element.classList.toggle(token, force);
  }
}

export {
  toggleClassList
};
