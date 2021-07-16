

export const ajax =({  url, method, data, cbSuccess, error }) => {

    fetch( url, { 
        method, 
        body: data
    })
     .then( res => res.ok ? res.json : Promise.reject(res))
     .then( (datos) => cbSuccess(datos))
     .catch( err => error(err));
}