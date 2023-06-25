import camelot
import pandas as pd

tables = camelot.read_pdf("البريد الجامعي.pdf",flavor='stream', pages='1-end')
combined_tables = pd.DataFrame()


for table in tables:
    df = table.df
    combined_tables = pd.concat([combined_tables, df])

combined_tables.to_csv('البريد الجامعي.csv', index = False, encoding='utf-8-sig')
