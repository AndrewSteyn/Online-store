let shoppingCart = new Vue({
                el : '#shoppingApp',
                data : {
                    totalItems : 0,
                    itemsObj : {},
                    quantities : [],
                    totalPrice : 0,
                    priceArr : []
                }, 
                methods : {
                    addToCart(){
                        let prodName = event.target.id;
                        //console.log(prodName);
                        let numberOfItems = parseInt(document.getElementById(prodName+"quantity").value);
                        //console.log(numberOfItems);
                        this.updateItemsObj(this.itemsObj, prodName, numberOfItems);
                        //forceUpdate not needed because Vue.set is used to add a reactive property
                        //this.$forceUpdate();
                        this.calcTotalPrice(this.itemsObj);
                        this.priceArr = [];
                    },
                    updateItemsObj(obj, elem, item){
                        //obj[elem] = item;
                        //Must use Vue.set when adding a reactive property to an object
                        let itemObj = {};
                        Vue.set( itemObj, 'quantity', item);
                        Vue.set( obj, elem, itemObj );
                        this.totalItems = this.addAllCartItems(obj)
                    },
                    addAllCartItems(cartItems){
                        var x = 0;
                        var total = 0;
                        for (x in cartItems) {
                           //total += cartItems[x];
                           //console.log(cartItems[x].quantity);
                             total += Number(cartItems[x].quantity);
                        }
                        return total;
                    },
                    deleteItem(){
                        //returns property Boxers, Dress etc
                        let x = event.target.value;
                        //console.log(x);
                        this.updateItemsObj(this.itemsObj, x, 0);
                        this.calcTotalPrice(this.itemsObj);
                        this.priceArr = [];
                    },
                    duplicateObj(obj){
                        for (x in obj){
                            //console.log(obj[x].quantity);
                            this.quantities.push(obj[x].quantity);
                            this.$forceUpdate();
                        }
                    },
                    resetChanges(arr, obj){
                            //console.log("something special" + arr[x]);
                            let x = 0;
                            for(y in obj){
                                    Vue.set( obj[y], 'quantity', arr[x]);
                                    x++;
                                }
                            //Vue.set( obj[x], 'quantity', arr[x]);
                        this.totalItems = this.addAllCartItems(obj);
                        this.calcTotalPrice(obj);
                        this.priceArr = [];
                        return this.quantities = [];
                    },
                    calcTotalPrice(obj){
                        for (x in obj){
                            let y = x + "price";
                            let price = document.getElementById(y).value;
                            let itemTotal = Number(price) * Number(obj[x].quantity);
                            this.priceArr.push(itemTotal);
                            //console.log(this.priceArr);
                            this.totalPrice = this.priceArr.reduce((a, b) => a + b);
                            //console.log(itemTotal);
                        }
                    },
                    upDateEditCart(obj){
                        this.calcTotalPrice(obj);
                        this.priceArr = [];
                        this.totalItems = this.addAllCartItems(obj);
                    },
                    continueShopping(){
                        this.quantities = [];
                        this.priceArr = [];
                        this.$forceUpdate();
                    },
                    cleanup(){
                        console.log("we are cleaning up");
                    }
                },//end methods
                computed : {
                    calcCartItems(){
                        return 0;
                    },
                    ZARtoUSD(){
                        return this.totalPrice/18.43;
                    }
                }
            });