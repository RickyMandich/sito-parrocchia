<?php
    class Utente{
        private $nome;
        private $id;
        private $email;
        private $password;
        private $abilitazione;

        function __construct(string $nome, int $id, string $email, string $password, int $abilitazione){
            $this->nome = $nome;
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->abilitazione = $abilitazione;
        }

        public function getNome(): string{
            return $this->nome;
        }
        public function getID(): int{
            return $this->id;
        }
        public function getEmail(): string{
            return $this->email;
        }
        public function getPassword(): string{
            return $this->password;
        }
        public function getAbilitazione(): int{
            return $this->abilitazione;
        }
    }