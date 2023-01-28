module.exports = (sequelize, DataTypes) => {
  const Courses = sequelize.define(
    "Courses",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      certificate: {
        type: DataTypes.BOOLEAN,
        allowNUll: false,
      },
      thumbnail: {
        type: DataTypes.STRING,
        allowNull: true,
      },
      type: {
        type: DataTypes.ENUM,
        values: ["draft", "published"],
      },
      price: {
        type: DataTypes.DOUBLE,
      },
      level: {
        type: DataTypes.ENUM,
        values: ["all-level", "beginner", "intermediate", "advanced"],
      },
      description: {
        type: DataTypes.TEXT,
      },
      mentor_id: {
        type: DataTypes.INTEGER,
      },
      roadmap_id: {
        type: DataTypes.INTEGER,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "courses",
      timestamps: true,
    }
  );
  Courses.associate = (models) => {
    Courses.belongsTo(models.Roadmap, {
      foreignKey: "roadmap_id",
      sourceKey: "id",
    });
  };

  Courses.associate = (models) => {
    Courses.hasMany(models.Lessons, {
      foreignKey: "courses_id",
    });
  };
  return Courses;
};
