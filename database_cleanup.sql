-- Drop unnecessary columns and tables
ALTER TABLE `Voiture`
DROP COLUMN `Kilometrage`,
DROP COLUMN `PrixAchat`,
DROP COLUMN `Options`,
DROP COLUMN `Climatisation`,
DROP COLUMN `GPS`;

-- Add indexes for new search criteria
ALTER TABLE `Voiture`
ADD INDEX `idx_puissance` (`Puissance`),
ADD INDEX `idx_nb_places` (`NbPlaces`); 