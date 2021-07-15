import handleAdd from './handle_add.js';

document.addEventListener('submit', e => {
    if(e.target.matches('#formRegister')){
        handleAdd(e);
    }
});


