CREATE TABLE quotalimits (
  name VARCHAR(32) NOT NULL,
  quota_type VARCHAR(8) NOT NULL
  CHECK (quota_type IN ('user', 'group', 'class', 'all')),
  per_session BOOLEAN NOT NULL,
  limit_type VARCHAR(4) NOT NULL
  CHECK (limit_type IN ('soft', 'hard')),
  bytes_in_avail FLOAT NOT NULL,
  bytes_out_avail FLOAT NOT NULL,
  bytes_xfer_avail FLOAT NOT NULL,
  files_in_avail INT8 NOT NULL,
  files_out_avail INT8 NOT NULL,
  files_xfer_avail INT8 NOT NULL
);

CREATE TABLE quotatallies (
  name VARCHAR(32) NOT NULL,
  quota_type VARCHAR(8) NOT NULL
  CHECK (quota_type IN ('user','group','class','all')),
  bytes_in_used FLOAT NOT NULL,
  bytes_out_used FLOAT NOT NULL,
  bytes_xfer_used FLOAT NOT NULL,
  files_in_used INT8 NOT NULL,
  files_out_used INT8 NOT NULL,
  files_xfer_used INT8 NOT NULL
);