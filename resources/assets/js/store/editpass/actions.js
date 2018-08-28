
const uri = "/api/editpass";
export default {
    getAll({commit}) {
        return new Promise((resolve, reject) => {


            axios.get(uri)
            .then((response) => {
              commit('getupdatepsn', response.data.updatepsn);
              resolve()
            })
            .catch(function (error) {
                console.log(error)
            })
       

            
        })
      
    }
}