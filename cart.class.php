<?php 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
class Cart { 
    protected $cart_contents = array(); 
     
    public function __construct(){ 
        // dohvati shopping kosarin niz iz sesije  
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL; 
        if ($this->cart_contents === NULL){ 
            // postavi neke pocetne vrijednosti prvo 
            $this->cart_contents = array('cart_total' => 0, 'total_items' => 0); 
        } 
    } 
     
    /** 
     * Cart Contents: vraca cijeli niz iz kosarice 
     * @param    bool 
     * @return    array 
     */ 
    public function contents(){ 
        // rearrange the newest first 
        $cart = array_reverse($this->cart_contents); 
 
        // ukloni ih da ne bi pravili probleme pri kupovini 
        unset($cart['total_items']); 
        unset($cart['cart_total']); 
 
        return $cart; 
    } 
     
    /** 
     * dohvati  cart item: vraca specificni cart item detailje 
     * @param    string    $row_id 
     * @return    array 
     */ 
    public function get_item($row_id){ 
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id])) 
            ? FALSE 
            : $this->cart_contents[$row_id]; 
    } 
     
    /** 
     * Total Items: vraca ttotal item sumu  
     * @return    int 
     */ 
    public function total_items(){ 
        return $this->cart_contents['total_items']; 
    } 
     
    /** 
     * kosara total/ukupno vraca ukupnu cijenu  
     * @return    int 
     */ 
    public function total(){ 
        return $this->cart_contents['cart_total']; 
    } 
     
    /** 
     * ubaci proizvode u kosaru i spasi ih u sesiju 
     * @param    array 
     * @return    bool 
     */ 
    public function insert($item = array()){ 
        if(!is_array($item) OR count($item) === 0){ 
            return FALSE; 
        }else{ 
            if(!isset($item['id'], $item['name'], $item['price'], $item['qty'])){ 
                return FALSE; 
            }else{ 
                /* 
                 * Ubaci proizvod 
                 */ 
                // pripremi kolicinu 
                $item['qty'] = (float) $item['qty']; 
                if($item['qty'] == 0){ 
                    return FALSE; 
                } 
                // pripremi cijenu 
                $item['price'] = (float) $item['price']; 
                // stvori jedinstven (unique)identifikator za proizvod koji  ce se ubaciti u kosaricu 
                $rowid = md5($item['id']); 
                // dohvati kolicnu ako je vec spremna tamo i dodaj je 
                $old_qty = isset($this->cart_contents[$rowid]['qty']) ? (int) $this->cart_contents[$rowid]['qty'] : 0; 
                // nanovo napravi ulazak s unique identifikatorom i azuriraj kolicinum 
                $item['rowid'] = $rowid; 
                $item['qty'] += $old_qty; 
                $this->cart_contents[$rowid] = $item; 
                 
                // spasi proizvode iz kosarice
                if($this->save_cart()){ 
                    return isset($rowid) ? $rowid : TRUE; 
                }else{ 
                    return FALSE; 
                } 
            } 
        } 
    } 
     
    /** 
     * azuriraj kosaricu 
     * @param    array 
     * @return    bool 
     */ 
    public function update($item = array()){ 
        if (!is_array($item) OR count($item) === 0){ 
            return FALSE; 
        }else{ 
            if (!isset($item['rowid'], $this->cart_contents[$item['rowid']])){ 
                return FALSE; 
            }else{ 
                // pripremi kolicinu 
                if(isset($item['qty'])){ 
                    $item['qty'] = (float) $item['qty']; 
                    // remove the item from the cart, if quantity is zero 
                    if ($item['qty'] == 0){ 
                        unset($this->cart_contents[$item['rowid']]); 
                        return TRUE; 
                    } 
                } 
                 
                // pronadji kljuceve  
                $keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item)); 
                // prep the price 
                if(isset($item['price'])){ 
                    $item['price'] = (float) $item['price']; 
                } 
                // product id & name ne smiju biti promijenjeni 
                foreach(array_diff($keys, array('id', 'name')) as $key){ 
                    $this->cart_contents[$item['rowid']][$key] = $item[$key]; 
                } 
                // spasi podatke kosare
                return TRUE; 
            } 
        } 
    } 
     
    /** 
     * spasi kosarin niz u sesiju 
     * @return    bool 
     */ 
    protected function save_cart(){ 
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0; 
        foreach ($this->cart_contents as $key => $val){ 
            // niz mora sadrzavati odgovarajuce indekse
            if(!is_array($val) OR !isset($val['price'], $val['qty'])){ 
                continue; 
            } 
      
            $this->cart_contents['cart_total'] += ($val['price'] * $val['qty']); 
            $this->cart_contents['total_items'] += $val['qty']; 
            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['price'] * $this->cart_contents[$key]['qty']); 
        } 
         
        // ako je kosara prazna,izbrisi je iz sesije
        if(count($this->cart_contents) <= 2){ 
            unset($_SESSION['cart_contents']); 
            return FALSE; 
        }else{ 
            $_SESSION['cart_contents'] = $this->cart_contents; 
            return TRUE; 
        } 
    } 
     
    /** 
     * Uklanja proizvod iz kosare 
     * @param    int 
     * @return    bool 
     */ 
     public function remove($row_id){ 
        // unset & save 
        unset($this->cart_contents[$row_id]); 
        $this->save_cart(); 
        return TRUE; 
     } 
      
    /** 
     *Unisti kosaru:Isprazni kosaru i unisti sesiju  
     * @return    void 
     */ 
    public function destroy(){ 
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0); 
        unset($_SESSION['cart_contents']); 
    } 
}