let query = document.querySelector('#search');
let show_records = document.querySelector('#limit input');

// On search Enter set param and go to url
query?.addEventListener('keydown',(e)=>{

    if (e.key === "Enter") {
        let url = new URL( window.location.href );
        if( query.value )
            url.searchParams.set("search",query.value);
        else
            url.searchParams.delete("search");
        url.searchParams.delete("page");
        window.location.href = url;
    }
});
// On search lose focus set param and go to url
query?.addEventListener('focusout',(e)=>{
        let url = new URL( window.location.href );

        if( query.value )
            url.searchParams.set("search",query.value);
        else
            url.searchParams.delete("search");

        if( query.value === '' ) url.searchParams.delete( 'limit' );

        url.searchParams.delete("page");
        window.location.href = url;
});

// On show records enter
show_records?.addEventListener('keydown',(e)=>{
    if (e.key === "Enter") {

        let url = new URL( window.location.href );
        url.searchParams.set("limit",show_records.value);

        if( show_records.value === '' ) url.searchParams.delete( 'limit' );

        url.searchParams.delete("page");
        window.location.href = url;
    }
});
show_records?.addEventListener('focusout',(e)=>{
    let url = new URL( window.location.href );
    url.searchParams.set("limit",show_records.value);
    if( show_records.value === '' ) url.searchParams.delete( 'limit' );
    url.searchParams.delete("page");
    window.location.href = url;
});
