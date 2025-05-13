<?php
// src/User.php
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;
    private $reportedBugs = null;
    private $assignedBugs = null;


    public function getId(): int|null { return $this->id; }
    public function getName(): string { return $this->name; }
    public function setName(string $name): void { $this->name = $name; }
    public function __construct()
{
    $this->reportedBugs = new ArrayCollection();
    $this->assignedBugs = new ArrayCollection();
}
public function addReportedBug(Bug $bug): void
{
    $this->reportedBugs[] = $bug;
}
public function assignedToBug(Bug $bug): void
{
    $this->assignedBugs[] = $bug;
}
private $products;
public function assignToProduct(Product $product): void
{
$this->products[] = $product;
}
public function getProducts()
{
return $this->products;
}


}
