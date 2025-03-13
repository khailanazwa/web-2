<?php
class Animal {
    public $animal = ["Kucing", "Harimau", "Kelinci", "Buaya", "Ular"];

    function index(){
        echo "<ol>";
        foreach ($this->animal as $key => $value){
            echo "<li>$value</li>";
            
        }
        echo"</ol>";
    }
    function store($hewan){
        array_push($this->animal, $hewan);

        $this->index();
    }
    public function update($key, $value){

        if(isset($this->animal[$key])){
            $this->animal[$key] = $value;
            // Memanggil method index
            $this->index();
            } else{
            echo "hewan tidak ditemukan <br>";

        }
    }
    public function destroy($key){
        if(isset($this->animal[$key])){
            unset($this->animal[$key]);
            // Memanggil method index
            $this->index();
        } else{
            echo "hewan tidak ditemukan <br>";

        }

    }
}

$hewan = new Animal();
echo "index - menampilkan seluruh data hewan <br>";
$hewan->index();
echo "<br>";

echo "store- Menambahkan data hewan burung (Burung) <br>";
$hewan->store("Burung");   
echo "<br>";

echo "update- Mengubah data hewan<br>";
$hewan->update(6,"Kucing Anggora");
echo "<br>";

echo "destory- Menghapus data hewan<br>";
$hewan->destroy(0,);
echo "<br>";
?>