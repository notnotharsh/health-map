# Champaign County Health Maps

## Data is not accessible. What can we do?
Sites such as [this one](https://data.ccrpc.org/) have data on different health and economic indicators for different regions inside Champaign County. This data, however, is inaccessible to the general public and requires some visualization to raise awareness.

## Heatmaps!
These maps can massively impact individual's understanding of economic and health indicators among geographic features.

![image](https://user-images.githubusercontent.com/33330098/134790532-2eaf75cf-ea90-46f8-b1cc-564e7e5e39df.png)|![image](https://user-images.githubusercontent.com/33330098/134790536-31a51a0a-9613-48c8-b5b5-db2b6b9a1cc9.png)
:-------------------------------------------------------------------------------------------------------------:|:-------------------------------------------------------------------------------------------------------------:
Basic heatmap of individuals under the poverty line (constructed with Python, PHP, and HTML `<canvas>` | Map of townships in Champaign County

## What does this project do?
The HealthMap project aims to provide a framework for interpreting spatial data (given through CSV files) by providing a CSV implementation of Champaign County's various townships and using Python scripts to interpret any uploaded CSV file. Datasets based on proportion and percentage are converted linearly to color, while datasets based on a total amount/set of magnitudes of populations are converted logarithmically.

## Where is this project headed?
This project started as my submission for the [PYGHack](http://www.pyghack.com/) hackathon. **It is still in development.**
Please reach out to [me](https://github.com/notnotharsh) if you 
* are interested in making Champaign healthcare, economic, and demographic data more accessible to the general public for outreach purposes,
* have a dataset or set of datasets to make public, or
* have a standard for CSV files you'd like to implement that is evident in Champaign County datasets.
