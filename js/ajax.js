

export const ajax =({  url, method, data, cbSuccess, error }) => {

    fetch( url, { 
        method, 
        body: JSON.stringify(data)
    })
     .then( res => res.ok ? res.json : Promise.reject(res))
     .then( data => cbSuccess(data))
     .err( err => error(err));
}