# Changelog
All notable changes to this project will be documented in this file.

## [v1.4.1] - 2019-03-06
### Added
- Test GetTransactionByHashTest
- Test NodeWaitListTest

### Changed
- Get fee_reward & total_reward directly from node API

## [v1.4.0] - 2019-03-05
### Added
- Method NodeWaitList

## [v1.3.0] - 2019-02-26
### Added
- Block::getFeeReward
- Block::getFeeRewardRaw
- Block::getTotalReward
- Block::getTotalRewardRaw
- Transaction::isVirtual

## [v1.2.0] - 2019-02-25
### Added
- getRawData for single models

## [v1.1.1] - 2019-02-24
### Added
- Option to add custom method

### Removed
- Remove not needed debug messages

## [v1.1.0] - 2019-02-21
### Added
- Method DeleteAccount
- Method EncryptAccount
- Method ExportAccount
- Method ImportAccount
- Method NewAccount
- Method GetBlockCount
- Method GetBlocksByNumbers
- Method GetBlocksByRange
- Method GetTransactionByBlockHashAndIndex
- Method GetTransactionByBlockNumberAndIndex
- Method GetTransactionByHash
- Method NetworkHashRate
- Added tests

### Changed
- New Logic for managing and calling the methods

## [v1.0.0] - 2019-01-29
### Added
- First commit
