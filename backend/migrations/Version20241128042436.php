<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241128042436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE parent_company_id parent_company_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_4FBF094FD0D89E86 ON company (parent_company_id)');
        $this->addSql('ALTER TABLE `group` ADD company_id INT DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE is_collab is_collab TINYINT(1) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE korean_name korean_name VARCHAR(255) NOT NULL, CHANGE previous_name previous_name VARCHAR(255) NOT NULL, CHANGE previous_korean_name previous_korean_name VARCHAR(255) NOT NULL, CHANGE full_name full_name VARCHAR(255) NOT NULL, CHANGE alias alias VARCHAR(255) NOT NULL, CHANGE is_solo is_solo TINYINT(1) NOT NULL, CHANGE parent_group_id parent_group_id INT DEFAULT NULL, CHANGE formation formation INT NOT NULL, CHANGE disband disband VARCHAR(255) NOT NULL, CHANGE fanclub fanclub VARCHAR(255) NOT NULL, CHANGE debut_date debut_date DATE NOT NULL, CHANGE birth_date birth_date VARCHAR(255) NOT NULL, CHANGE is_deceased is_deceased TINYINT(1) NOT NULL, CHANGE sales sales INT NOT NULL, CHANGE awards awards INT NOT NULL, CHANGE views views INT NOT NULL, CHANGE total_pak total_pak INT NOT NULL, CHANGE gaon_digital_times gaon_digital_times INT NOT NULL, CHANGE gaon_digital_firsts gaon_digital_firsts INT NOT NULL, CHANGE yawards_total yawards_total INT NOT NULL, CHANGE social social VARCHAR(255) NOT NULL, CHANGE mslevel mslevel INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_6DC044C5979B1AD6 ON `group` (company_id)');
        $this->addSql('CREATE INDEX IDX_6DC044C561997596 ON `group` (parent_group_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE music_show (musicshow VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, id_artist INT UNSIGNED NOT NULL, date DATE NOT NULL, musicname VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, id_musicvideo INT UNSIGNED DEFAULT 0 NOT NULL, UNIQUE INDEX date (date)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE music_video (id INT UNSIGNED NOT NULL, dead VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'n\' NOT NULL COLLATE `utf8mb3_unicode_ci`, is_audio VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'n\' NOT NULL COLLATE `utf8mb3_unicode_ci`, id_parent INT UNSIGNED DEFAULT NULL, id_better_audio INT UNSIGNED DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, kname VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, original_name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, alias VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, vtype VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'main\' NOT NULL COLLATE `utf8mb3_unicode_ci`, tags VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, vlink VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, id_artist INT NOT NULL, id_original_artist INT NOT NULL, releasedate DATE NOT NULL, publishedon DATETIME NOT NULL, views BIGINT DEFAULT 0 NOT NULL, recentviews BIGINT DEFAULT 0 NOT NULL, recentlikes BIGINT DEFAULT 0 NOT NULL, youtubeadviews BIGINT DEFAULT 0 NOT NULL, likes BIGINT DEFAULT 0 NOT NULL, awards INT DEFAULT 0 NOT NULL, has_pak VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'n\' NOT NULL COLLATE `utf8mb3_unicode_ci`, regionlocked VARCHAR(500) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, youtubecharts MEDIUMTEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, UNIQUE INDEX vlink (vlink), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE agrelation (id_artist INT UNSIGNED NOT NULL, id_subgroup INT UNSIGNED NOT NULL, startyear INT UNSIGNED NOT NULL, endyear INT UNSIGNED NOT NULL, roles VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id_artist, id_subgroup)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE billboard (data DATE NOT NULL, ranklist MEDIUMTEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(data)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE upcoming (id INT UNSIGNED NOT NULL, id_artist INT UNSIGNED NOT NULL, rdate DATE NOT NULL, rtype VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gaondigi (year SMALLINT NOT NULL, week SMALLINT NOT NULL, ranklist MEDIUMTEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, aranklist MEDIUMTEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(year, week)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FD0D89E86');
        $this->addSql('DROP INDEX IDX_4FBF094FD0D89E86 ON company');
        $this->addSql('ALTER TABLE company CHANGE id id INT UNSIGNED NOT NULL, CHANGE parent_company_id parent_company_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5979B1AD6');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C561997596');
        $this->addSql('DROP INDEX IDX_6DC044C5979B1AD6 ON `group`');
        $this->addSql('DROP INDEX IDX_6DC044C561997596 ON `group`');
        $this->addSql('ALTER TABLE `group` ADD parent_company_id INT UNSIGNED DEFAULT 0 NOT NULL, ADD id_debut INT UNSIGNED DEFAULT NULL, ADD id_country INT UNSIGNED DEFAULT 114 NOT NULL, DROP company_id, CHANGE id id INT UNSIGNED NOT NULL, CHANGE parent_group_id parent_group_id INT UNSIGNED DEFAULT 0 NOT NULL, CHANGE is_collab is_collab VARCHAR(255) DEFAULT \'n\' NOT NULL, CHANGE name name VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE korean_name korean_name VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE previous_name previous_name VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE previous_korean_name previous_korean_name VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE full_name full_name VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE alias alias VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE is_solo is_solo VARCHAR(255) DEFAULT \'n\' NOT NULL, CHANGE formation formation INT DEFAULT NULL, CHANGE disband disband VARCHAR(7) DEFAULT \'\' NOT NULL, CHANGE fanclub fanclub VARCHAR(255) DEFAULT NULL, CHANGE debut_date debut_date DATE DEFAULT NULL, CHANGE birth_date birth_date DATE DEFAULT NULL, CHANGE is_deceased is_deceased VARCHAR(255) DEFAULT \'n\' NOT NULL, CHANGE sales sales INT DEFAULT 0 NOT NULL, CHANGE awards awards INT DEFAULT 0 NOT NULL, CHANGE views views BIGINT DEFAULT 0 NOT NULL, CHANGE total_pak total_pak INT DEFAULT 0 NOT NULL, CHANGE gaon_digital_times gaon_digital_times INT DEFAULT 0 NOT NULL, CHANGE gaon_digital_firsts gaon_digital_firsts INT DEFAULT 0 NOT NULL, CHANGE yawards_total yawards_total INT DEFAULT 0 NOT NULL, CHANGE social social VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE mslevel mslevel INT DEFAULT 1 NOT NULL');
    }
}
