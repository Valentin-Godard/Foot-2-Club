<?php
namespace App\Trait;

trait Image {
    private string $image;

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }
}