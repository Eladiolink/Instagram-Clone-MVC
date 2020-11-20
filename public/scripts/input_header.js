let search= document.getElementById('search');
let text_search=document.getElementById('text-search');
let search_span= document.getElementById('search-span');
let search_input=document.getElementById('search-input');
let close_search=document.getElementById('close-search');

text_search.addEventListener('click',()=>{

    search_input_enabled()

})

search.addEventListener('focusout',()=>{
    
    search_input_disabled()

})

close_search.addEventListener('click',()=>{
    search_input_disabled()
    
})


function search_input_disabled(){
    text_search.style.display="flex";
    search_span.style.display="none";
}

function search_input_enabled(){
    text_search.style.display="none";
    search_span.style.display="block";
    search_input.focus();
    console.log('ok')
}