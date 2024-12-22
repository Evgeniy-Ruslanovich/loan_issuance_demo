<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222105741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->connection->insert('address', [
            'state' => 'NY',
            'zip' => '112233',
            'address' => 'Lenin ave, 1',
            'city' => 'New York',
        ]);
        $this->connection->insert('address', [
            'state' => 'NV',
            'zip' => '223344',
            'address' => 'Stalin square, 2',
            'city' => 'Las Vegas',
        ]);
        $this->connection->insert('address', [
            'state' => 'CA',
            'zip' => '33445',
            'address' => 'Khruschev st, 3',
            'city' => 'San Francisco',
        ]);
        $this->connection->insert('address', [
            'state' => 'KY',
            'zip' => '44556',
            'address' => 'Brezhnev st, 4',
            'city' => 'Frankfort',
        ]);

        $this->connection->insert('customer', [
            'address_id' => 1,
            'first_name' => 'Vladimir',
            'last_name' => 'Lenin',
            'age' => 45,
            'ssn' => '222-33-4444',
            'fico' => 500,
            'email' => 'red@revolution.party',
            'phone_number' => '+54-4433-321'
        ]);
        $this->connection->insert('customer', [
            'address_id' => 2,
            'first_name' => 'Joseph',
            'last_name' => 'Stalin',
            'age' => 55,
            'ssn' => '333-44-5555',
            'fico' => 600,
            'email' => 'boss@gulag.org',
            'phone_number' => '111'
        ]);
        $this->connection->insert('customer', [
            'address_id' => 3,
            'first_name' => 'Nikita',
            'last_name' => 'Khruschev',
            'age' => 62,
            'ssn' => '444-55-666',
            'fico' => 700,
            'email' => 'kuzkina@mat.vam',
            'phone_number' => '+6-777-888-99'
        ]);
        $this->connection->insert('customer', [
            'address_id' => 4,
            'first_name' => 'Leonid',
            'last_name' => 'Brezhnev',
            'age' => 75,
            'ssn' => '555-66-7777',
            'fico' => 200,
            'email' => 'firs@comrade.com',
            'phone_number' => '+99-8888-1212'
        ]);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
