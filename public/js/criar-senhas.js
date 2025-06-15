     document.addEventListener('DOMContentLoaded', function () {
         const wrapper = document.getElementById('inputs-wrapper');
         const addBtn = document.getElementById('add-btn');

         addBtn.addEventListener('click', function () {
             const blocks = wrapper.querySelectorAll('.service-block');
             const newBlock = blocks[0].cloneNode(true);

             // Limpa os valores dos inputs clonados
             newBlock.querySelectorAll('input').forEach(input => input.value = '');

             // Mostra o botão remover nos blocos duplicados
             newBlock.querySelector('.remove-btn').classList.remove('hidden');

             wrapper.appendChild(newBlock);
         });

         wrapper.addEventListener('click', function (e) {
             if (e.target.classList.contains('remove-btn')) {
                 e.target.closest('.service-block').remove();
             }
         });
     });
