<?php
class TridiagonalMatrix
{
    public $a;
    public $b;
    public $c;
    public $d;
    public $n;
    
    public function __construct($a,$b,$c,$d,$n){
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
        $this->n = $n;
    }

    public function calc()
    {
        $this->n--; // since we start from x0 (not x1)
        $this->c[0] = $this->c[0] / $this->b[0];
        $this->d[0] =$this->d[0] /  $this->b[0];

        for ($i = 1; $i < $this->n; $i++) {
            $this->c[$i] /= $this->b[$i] - $this->a[$i]*$this->c[$i-1];
            $this->d[$i] = ($this->d[$i] - $this->a[$i]*$this->d[$i-1]) / ($this->b[$i] - $this->a[$i]*$this->c[$i-1]);
        }

        $this->d[$this->n] = ($this->d[$this->n] - $this->a[$this->n]*$this->d[$this->n-1]) / ($this->b[$this->n] - $this->a[$this->n]*$this->c[$this->n-1]);

        for ($i = $this->n; $i-- > 0;) {
            $this->d[$i] -= $this->c[$i]*$this->d[$i+1];
        }

        return $this->d;
    }
}
?>